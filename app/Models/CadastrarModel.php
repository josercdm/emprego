<?php

namespace Modelos;

use PDO;
use Modelos\Conn;

class CadastrarModel {

    protected $db;

    public function __construct() {
        $this->db = Conn::getConectar();
    }

    public function create(array $data) {

        $usuario = $this->db->prepare("INSERT INTO membros (name, email, pass, data) VALUES (:name,:email,:pass,:data)");
        $usuario->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $usuario->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $usuario->bindValue(':pass', $data['pass'], PDO::PARAM_STR);
        $usuario->bindValue(':data', $data['data'], PDO::PARAM_STR);

        $usuario->execute();
        return 'ok';
    }

    public function read() {
        $query = $this->db->prepare("SELECT * FROM membros ORDER BY name");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOnline($number) {
        $query = $this->db->prepare("SELECT * FROM membros WHERE status = :status");
        $query->bindValue(':status', $number, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($param) {
        $up = $this->db->prepare("UPDATE membros SET name = :name WHERE id = :id");
        $up->bindValue(':id', $param['id'], PDO::PARAM_INT);
        $up->bindValue(':name', $param['name'], PDO::PARAM_STR);
        $up->execute();

        return 'ok';
    }

    public function delete($param) {
        $del = $this->db->prepare("DELETE FROM membros WHERE id = :id");
        $del->bindValue(':id', $param['id'], PDO::PARAM_INT);
        $del->execute();

        return 'ok';
    }

}
