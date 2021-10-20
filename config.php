<?php

define('DATABASE_CONSTANTS',[
    'host'      => 'localhost',
    'dbname'    => 'customers',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
]);

define("SITE_URL", "http://localhost:8080");

function dd( $data ) {
    
    echo "<style>pre{background: #f4f4f4; border: 1px solid #ddd; border-left: 3px solid #3366f3; color: #555; page-break-inside: avoid; font-family: monospace; font-size: 15px; line-height: 1.6; margin-bottom: 1.6em; max-width: 100%; overflow: auto; padding: 1em 1.5em; display: block; word-wrap: break-word;}</style>";
    echo '<pre>';
    var_dump( $data );

    die();
  }