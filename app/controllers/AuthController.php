<?php

namespace App\Controllers;

use App\Models\Users;

class AuthController
{

  /**
   * Metodo responsável por verificar os dados de login do cliente e salvar na sessão
   *
   * @return void
   */
  public function login(): void
  {

    if (isset($_POST['email']) && !empty($_POST['email'])) {

      // faz a sanitização do e-mail para evitar envio de caracteres estranhos
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

      $params = [
        ':email' => $email,
        ':senha' => md5($_POST['senha'])
      ];

      $usuario = new Users();
      $users = $usuario->getUser($params);

      // se retornou um usuário válido salva os dados na sessão 
      // e direciona para a home
      if (count($users) > 0) {

        foreach ($users as $user) {
          $_SESSION['user'] = [
            'id' => $user->id,
            'nome' => $user->nome
          ];
        }

        header('Location:' . SITE_URL);
        return;
      }

      // se não retornou um usuário, retorna para rota com uma mensagem de erro
      $_SESSION['flash-message'] = [
        "tipo" => "danger",
        "mensagem" => "Dados de acesso inválidos"
      ];

      header('Location:' . SITE_URL);
    }

    // se os dados passados estiverem em branco, retorna para rota com uma mensagem de erro
    $_SESSION['flash-message'] = [
      "tipo" => "danger",
      "mensagem" => "Dados de acesso inválidos"
    ];

    header('Location:' . SITE_URL);
  }

  /**
   * Metodo responsável por cadastrar o cliente na base e salvar os dados do cliente cadastrado na sessão
   *
   * @return void
   */
  public function cadastraUsuario(): void
  {

    if (!isset($_POST['nome']) && !isset($_POST['email']) && !isset($_POST['senha'])) {

      $_SESSION['flash-message'] = [
        "tipo" => "danger",
        "mensagem" => "Dados de acesso inválidos"
      ];

      header('Location:' . SITE_URL . '/?q=cadastro');
      return;
    }

    if (empty($_POST['nome']) && empty($_POST['email']) && empty($_POST['senha'])) {

      $_SESSION['flash-message'] = [
        "tipo" => "danger",
        "mensagem" => "Dados de acesso inválidos"
      ];

      header('Location:' . SITE_URL . '/?q=cadastro');
      return;
    }

    if( $_POST['senha1'] != $_POST['senha2']){

      $_SESSION['flash-message'] = [
        "tipo" => "danger",
        "mensagem" => "Dados de acesso inválidos"
      ];

      header('Location:' . SITE_URL . '/?q=cadastro');
      return;

    }

    $usuario = new Users();

    $params = [
      ':nome' => addslashes($_POST['nome']),
      ':email' => addslashes(strtolower(trim($_POST['email']))),
      ':senha' => addslashes(md5($_POST['email']))
    ];

    $users = $usuario->createUser($params);

    foreach ($users as $user) {
      $_SESSION['user'] = [
        'id' => $user->id,
        'nome' => $user->nome
      ];
    }

    header('Location:' . SITE_URL);

  }
}
