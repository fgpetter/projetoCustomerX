<?php

namespace App;

use Exception;

class Render {

  
  public static function Layout(array $partials, array $data = null ): void
  {

    // check if is a valid array
    if(!is_array( $partials )) {

      throw new Exception('Coleção de dados inválida');
    }

    if(!empty( $data ) && is_array( $data )) {

      extract( $data );
    }

    foreach( $partials as $partial ) {

      include( "../app/views/$partial.php");
    }

  }    
    
}