<?php

/**
 * 
 * Esse arquivo atua como um sistema de rotas rudimentar, 
 * onde lê uma requisição GET e direcina para a classe e método correta
 * 
 */



/**
 * Lista das rotas criadas na aplicação
 */
$routes = [
    
    'index' => 'mainController@index',

    'login' => 'mainController@login',
    'logon' => 'authController@login',
    'cadastro' => 'mainController@cadastro',
    'cadastra-usuario' => 'authController@cadastraUsuario',
    
    'clientes' => 'mainController@clientes',
    'cadastrar-cliente' => "mainController@insertCliente",
    'atualizar-cliente' => "mainController@updateCliente",
    'remover-cliente' => "mainController@deleteCliente",
    
    'cadastrar-contato' => "mainController@insertContato",
    'atualizar-contato' => "mainController@updateContato",
    'remover-contato' => "mainController@deleteContato",
    
];


$redirect = "index";

if (empty($_SESSION['user'])){
    
    $redirect = "login";

}

/**
 * Verifica se a rota passda existe na lista, caso contrário redireciona para index
 */
if( isset( $_GET['q'] ) ){

    if( !key_exists($_GET['q'], $routes) ){

        $redirect = "index";

    } else {

        $redirect = $_GET['q'];

    }

}

/**
 * 
 * Separa valor do redirect ex. 'main@index' em um array, atribui cada posição de um array 
 * para uma variavel e monta objeto a ser instanciado
 * 
 * Feito isso, o valor retornado do método será disponível na index.php
 * 
 */
$splitRouteString = explode('@', $routes[$redirect]);

$class = '\\App\\Controllers\\'.ucfirst($splitRouteString[0]);

$method = $splitRouteString[1];

$controller = new $class();

$controller->$method();