<?php

namespace Modelos;

use PDO;
use Modelos\Conn;

class LoginModel {

    private $db;

    public function __construct() {
        $this->db = Conn::getConectar();
    }

    function login(array $param) {

        $query = $this->db->prepare("SELECT * FROM membros WHERE email = :email");
        $query->bindValue(':email', $param['email'], \PDO::PARAM_STR);
        $query->execute();

        $fetch = $query->fetch(\PDO::FETCH_ASSOC);
        if (!password_verify($param['pass'], $fetch['pass'])) {
            $retorno = 'Senha inválida!';
        } else {
            $_SESSION['userid'] = $fetch['id'];
            $_SESSION['name'] = $fetch['name'];
            $_SESSION['email'] = $fetch['email'];
            $_SESSION['nivel'] = 'Membro';

            $param['status'] = 1;
            $param['id'] = $fetch['id'];

            $this->update($param);

            $retorno = 'ok';
        }

        return $retorno;
    }
    
    function loginAdm(array $param) {

        $query = $this->db->prepare("SELECT * FROM admin WHERE email = :email");
        $query->bindValue(':email', $param['email'], \PDO::PARAM_STR);
        $query->execute();

        $fetch = $query->fetch(\PDO::FETCH_ASSOC);
        if ($param['pass'] != $fetch['pass']) {
            $retorno = 'Senha inválida!';
        } else {
            $_SESSION['userid'] = $fetch['id'];
            $_SESSION['name'] = $fetch['name'];
            $_SESSION['email'] = $fetch['email'];
            $_SESSION['nivel'] = 'admin';

            $param['status'] = 1;
            $param['id'] = $fetch['id'];

            $retorno = 'ok';
        }

        return $retorno;
    }

    public function update($param) {
        $up = $this->db->prepare("UPDATE membros SET status = :status WHERE id = :id");
        $up->bindValue(':status', $param['status'], PDO::PARAM_INT);
        $up->bindValue(':id', $param['id'], PDO::PARAM_INT);
        $up->execute();
    }

    function logout($userid) {       
        
        $param['status'] = 0;
        $param['id'] = $userid;
        
        $this->update($param);
        
        session_destroy();
        
        return 'ok';
    }

}
