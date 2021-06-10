<?php

namespace App\Models;

use App\Database;
use App\Helpers;

class Contatos {


    /**
     * Seleciona todos os contatos na base de dados
     *
     * @return array
     */
    public function getContatos():array
    {            
        $contatos = [];

        $db = new Database();
        $contatos = $db->select("SELECT id, nome, email, telefone, cliente_id FROM contatos");
        return $contatos;
    }

    /**
     * Verifica se é um contato válido
     *
     * @param array $id
     * @return boolean
     */
    public function validateContato( array $id ): bool
    {
        $db = new Database();
        $contatos = $db->select("SELECT id FROM contatos WHERE id = :id", $id);
        if(count( $contatos ) > 0){
            return true;
        }
        return false;
    }

    /**
     * Adiciona um novo contato na base de dados
     *
     * @param array $params
     * @return void
     */
    public function createContato( array $params ):void
    {
        $db = new Database();
        $db->insert("INSERT INTO contatos VALUES(0, :nome, :email, :telefone, :cliente_id)", $params);
    }


    /**
     * Atualiza os dados de um contato
     *
     * @param array $params
     * @return void
     */
    public function updateContato( array $params ):void
    {
        $db = new Database();
        $db->update("UPDATE contatos SET nome=:nome, email=:email, telefone=:telefone WHERE id = :id", $params);
    }


    /**
     * Deleta o contato
     *
     * @param array $params
     * @return void
     */
    public function deleteContato( array $params ): void
    {
        $db = new Database();
        $db->delete("DELETE FROM contatos WHERE id = :id", $params);
    }


}