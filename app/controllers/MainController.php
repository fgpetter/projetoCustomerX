<?php

namespace App\Controllers;

use App\Models\Clientes;
use App\Models\Contatos;
use App\Render;

class MainController {

    /**
     * Metodo responsavel por renderizar a página
     * Carrega dados de clientes e contatos a partir da camada de modelo
     *
     * @return void
     */
    public function index():void
    {

        $clientes = (new Clientes)->getClientes();
        $contatos = (new Contatos)->getContatos();
       
        $data = [
            "clientes" => $clientes,
            "contatos" => $contatos
        ];
        
        Render::Layout([
            "html_header",
            "pagina_inicial",
            "html_footer"
        ], $data);

    }


    public function login():void
    {
        Render::Layout([
            "html_header",
            "login",
            "html_footer"
        ]);

    }


    public function cadastro():void
    {
        Render::Layout([
            "html_header",
            "cadastro",
            "html_footer"
        ]);

    }




    /**
     * Metodo responsavel por enviar os dados para a camada de modelo cadastrar cliente
     *
     * @return void
     */
    public function insertCliente():void
    {
        $cliente = new Clientes;

        $sanitizeTel = ['-', '(', ')',' '];

        $params = [
            ':nome' => addslashes( $_POST['nome'] ),
            ':email' => addslashes( strtolower( trim( $_POST['email'] ) ) ),
            ':telefone' => addslashes( trim( str_replace( $sanitizeTel, '', $_POST['telefone'] ) ) ),
        ];

        $cliente->createCliente($params);

        $_SESSION['flash-message'] = [
            "tipo" => "success",
            "mensagem" => "Cliente adicionado com sucesso"
        ];


        header( 'Location:'.SITE_URL );
    }

    
    /**
     * Atualiza dados do cliente
     *
     * @return void
     */
    public function updateCliente()
    {

        $cliente = new Clientes;

        if( $cliente->validateCliente( [':id' => addslashes( $_POST['id'] )] ) ){

            $sanitizeTel = ['-', '(', ')',' '];

            $params = [
                ':id' => addslashes( $_POST['id'] ),
                ':nome' => addslashes( $_POST['nome'] ),
                ':email' => addslashes( strtolower( trim( $_POST['email'] ) ) ),
                ':telefone' => addslashes( trim( str_replace( $sanitizeTel, '', $_POST['telefone'] ) ) ),
            ];

            $cliente->updateCliente($params);

        }

        $_SESSION['flash-message'] = [
            "tipo" => "success",
            "mensagem" => "Contato atualizado com sucesso"
        ];

        header('Location:'.SITE_URL);

    }


    /**
     * Metodo responsavel por enviar os dados para a camada de modelo cadastrar cliente
     *
     * @return void
     */
    public function insertContato():void
    {
        $contato = new Contatos;

        $sanitizeTel = ['-', '(', ')',' '];

        $params = [
            ':nome' => addslashes( $_POST['nome'] ),
            ':email' => addslashes( strtolower( trim( $_POST['email'] ) ) ),
            ':telefone' => addslashes( trim( str_replace( $sanitizeTel, '', $_POST['telefone'] ) ) ),
            ':cliente_id' => $_POST['cliente_id']
        ];

        $contato->createContato($params);

        $_SESSION['flash-message'] = [
            "tipo" => "success",
            "mensagem" => "Contato adicionado com sucesso"
        ];

        header('Location:'.SITE_URL);
    }


    /**
     * Atualiza dados do cliente
     *
     * @return void
     */
    public function updateContato()
    {

        $contato = new Contatos;

        if($contato->validateContato([':id' => addslashes( $_POST['id'] )])){

            $sanitizeTel = ['-', '(', ')',' '];

            $params = [
                ':id' => addslashes( $_POST['id'] ),
                ':nome' => addslashes( $_POST['nome'] ),
                ':email' => addslashes( strtolower( trim( $_POST['email'] ) ) ),
                ':telefone' => addslashes( trim( str_replace( $sanitizeTel, '', $_POST['telefone'] ) ) ),
            ];

            $contato->updateContato($params);

        }

        $_SESSION['flash-message'] = [
            "tipo" => "success",
            "mensagem" => "Contato atualizado com sucesso"
        ];


        header('Location:'.SITE_URL);

    }


    /**
     * Remove cliente e todos contatos
     *
     * @return void
     */
    public function deleteCliente()
    {
        $cliente = new Clientes;

        if($cliente->validateCliente( [':id' => addslashes( $_POST['id'] )] ) ){

            $cliente->deleteCliente( [':id' => addslashes( $_POST['id'] )] );

        }

        $_SESSION['flash-message'] = [
            "tipo" => "danger",
            "mensagem" => "Cliente removido com sucesso"
        ];

        header('Location:'.SITE_URL);
    }


    /**
     * Remove cliente e todos contatos
     *
     * @return void
     */
    public function deleteContato()
    {
        $contato = new Contatos;

        if($contato->validateContato( [':id' => addslashes( $_POST['id'] )] ) ){

            $contato->deleteContato( [':id' => addslashes( $_POST['id'] )] );

        }

        $_SESSION['flash-message'] = [
            "tipo" => "danger",
            "mensagem" => "Contato removido com sucesso"
        ];

        header('Location:'.SITE_URL);
        
    }


}