<?php

namespace App\Models;

use App\Database;

class Clientes {

    /**
     * Seleciona todos os clientes na base de dados
     *
     * @return array
     */
    public function getClientes():array
    {
        $clientes = [];

        $db = new Database();
        $clientes = $db->select("SELECT id, nome, email, telefone, data_registro FROM clientes");
        return $clientes;

    }

    public function validateCliente(array $id): bool
    {
        $db = new Database();
        $clientes = $db->select("SELECT id FROM clientes WHERE id = :id", $id);
        if(count($clientes) > 0){
            return true;
        }
        return false;
    }


    /**
     * Adiciona um novo cliente na base de dados
     *
     * @param array $params
     * @return void
     */
    public function createCliente(array $params):void
    {
        $db = new Database();
        $db->insert("INSERT INTO clientes VALUES(0, :nome, :email, :telefone, NOW())", $params);
    }


    /**
     * Atualiza os dados de um cliente
     *
     * @param array $params
     * @return void
     */
    public function updateCliente(array $params):void
    {
        $db = new Database();
        $db->update("UPDATE clientes SET nome=:nome, email=:email, telefone=:telefone WHERE id = :id", $params);
    }

    /**
     * Deleta o cliente e todos seus contatos
     *
     * @param array $params
     * @return void
     */
    public function deleteCliente(array $params): void
    {
        $db = new Database();
        $db->delete("DELETE FROM clientes WHERE id = :id", $params);

        $db->delete("DELETE FROM contatos WHERE cliente_id = :id", $params);
    }

}