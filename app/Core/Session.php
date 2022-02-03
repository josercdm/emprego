<?php

namespace Cores;

class Session {

    protected $userid;

    function logar() {

        $fetch = $this->getArray_data();

        if (!isset($_SESSION))
            session_start();

        $_SESSION['first_name'] = $fetch['nome'];
        $_SESSION['last_name'] = $fetch['sobrenome'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['cpf'] = $fetch['cpf'];

        $auth = $this->db->conectar()->prepare("SELECT token FROM authentication WHERE matricula = :matricula OR matricula = :userid");
        $auth->bindValue(':matricula', $fetch['matricula'], PDO::PARAM_INT);
        $auth->bindValue(':userid', $fetch['id'], PDO::PARAM_INT);
        $auth->execute();

        $token = $auth->fetch(PDO::FETCH_ASSOC);
        $_SESSION['token'] = $token['token'];
        if ($this->getMatricula() == $fetch['email']) {
            $_SESSION['aluno'] = $fetch['id'];
        } else {
            $_SESSION['aluno'] = $fetch['matricula'];
        }

        return 'ok';
    }

}
