<?php

session_start();

/**
 * Carrega as classes através do composer autoload
 */
use App\Helpers;

require_once('../vendor/autoload.php');

/**
 * Carrega as constantes do config
 */
require_once('../config.php');

/**
 * Carrega as rotas da aplicação
 */
require_once('../app/routes.php');
