<?php

namespace App\Models;

use App\Database;

class Users {

    /**
     * Seleciona usuário na base de dados e retorna o usuário para sessão
     *
     * @param array $params
     * @return array
     */
    public function getUser(array $params):array
    {
        $user = [];

        $db = new Database();
        $user = $db->select("SELECT id, nome, email FROM usuarios WHERE email = :email AND senha = :senha LIMIT 1", $params);
        return $user;

    }

    /**
     * Insere um usuário na base de dados e retorna o usuário para sessão
     *
     * @param array $params
     * @return array
     */
    public function createUser(array $params):array
    {
    
        $db = new Database();
        $db->insert("INSERT INTO usuarios VALUES(0, :nome, :email, :senha)", $params);

        $email = [
            ":email" => $params[':email']
        ];
        $user = $db->select("SELECT id, nome FROM usuarios WHERE email = :email LIMIT 1", $email);

        return $user;
    }




}