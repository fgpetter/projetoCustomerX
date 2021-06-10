<?php

namespace App;

use Exception;
use PDO;
use PDOException;

/**
 * 
 * A classe Database vai atuar como um rudimentar query buider para a aplicação
 * 
 */
class Database {

    private $conn;

    /**
     * Inicializa a conexão ao banco de dados
     *
     * @return void
     */
    private function up()
    {
        $this->conn = new PDO(
            'mysql:host='.DATABASE_CONSTANTS['host'].';'.
            'dbname='.DATABASE_CONSTANTS['dbname'].';'.
            'charset='.DATABASE_CONSTANTS['charset'],
            DATABASE_CONSTANTS['username'],
            DATABASE_CONSTANTS['password']
        );
        
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    /**
     * Encerra conexão ao banco de dados
     * @return void
     */
    private function down()
    {
        $this->conn = null;
    }


    /**
     * Construtor de query para SELECT
     * 
     * @param string $query
     * @param array|null $params
     * @return array
     * @throws Exception
     */
    public function select(string $query, array $params = null) : array
    {

        // verifica se a query é realmente um select
        if(!preg_match("/^SELECT/i", $query)){
            throw new Exception('Erro de banco de dados - Não é uma instrução SELECT válida');
        }
        
        $this->up();
    
        $results = null;
    
        try {

            $stmt = $this->conn->prepare( $query );
            ($params) ? $stmt->execute( $params ) : $stmt->execute();
            $results = $stmt->fetchAll( PDO::FETCH_CLASS );
          
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }
    
        $this->down();
    
        return $results;

    }

    
    /**
     * Construtor de query para UPDATE
     *
     * @param string $query
     * @param array|null $params
     * @return void
     * @throws Exception
     */
    public function update(string $query, array $params = null) : void
    {

        if(!preg_match("/^UPDATE/i", $query)){
            throw new Exception('Erro de banco de dados - Não é uma instrução UPDATE válida');
        }

        $this->up();

        try {

            $stmt = $this->conn->prepare( $query );
            ($params) ? $stmt->execute( $params ) : $stmt->execute();
          
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }

        $this->down();

    }


    /**
     * Construtor de query para INSERT
     *
     * @param string $query
     * @param array|null $params
     * @return void
     * @throws Exception
     */
    public function insert(string $query, array $params = null) : void
    {

        if(!preg_match("/^INSERT/i", $query)){
            throw new Exception('Erro de banco de dados - Não é uma instrução INSERT válida');
        }

        $this->up();

        try {
            
            $stmt = $this->conn->prepare( $query );
            ($params) ? $stmt->execute( $params ) : $stmt->execute();
          
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }

        $this->down();

    }
    
    /**
     * Construtor de query para DELETE
     *
     * @param string $query
     * @param array|null $params
     * @return void
     * @throws Exception
     */
    public function delete(string $query, array $params = null) : void
    {

        if(!preg_match("/^DELETE/i", $query)){
            throw new Exception('Erro de banco de dados - Não é uma instrução DELETE válida');
        }

        $this->up();

        try {
            
            $stmt = $this->conn->prepare( $query );
            ($params) ? $stmt->execute( $params ) : $stmt->execute();
          
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }

        $this->down();
      
    }

    /**
     * Construtor de query para comandos SQL como TRUNCATE, DROP etc.
     *
     * @param string $query
     * @param array|null $params
     * @return void
     */
    public function statement(string $query, array $params = null) : void
    {

        if(preg_match("/^(DELETE|INSERT|UPDATE)/i", $query)){
            throw new Exception('Erro de banco de dados - Instrução SQL inválida');
        }

        $this->up();

        try {
            
            $stmt = $this->conn->prepare( $query );
            ($params) ? $stmt->execute( $params ) : $stmt->execute();
          
        } catch (PDOException $e) {

            throw new Exception($e->getMessage());

        }

        $this->down();

    }

}