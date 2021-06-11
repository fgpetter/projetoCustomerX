<nav class="navbar navbar-light bg-light mb-5">
  <div class="container">
    <span class="navbar-brand mb-0">
      <h2 class="logo"><strong>Customer</strong>X</h2>
    </span>
  </div>
</nav>

<div class="container d-flex align-items-center" style="height: 75vh;">

  <div class="card mx-auto">
    <div class="card-body" style="width: 24rem;">
      <h5 class="card-title logo py-3"><strong>Faça seu cadastro:</strong></h5>

      <form action="?q=cadastra-usuario" method="POST" class="mb-3">
        <div class="mb-3">
          <input type="nome" name="nome" class="form-control" placeholder="Seu nome" required>
        </div>
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
        </div>
        <div class="input-group flex-nowrap mb-3">
          <input type="password" name="senha1" class="form-control" placeholder="Senha de no mínimo 6 caracteres" id="passwordField" required>
          <span class="input-group-text" id="togglePassword"><i class="far fa-eye-slash"></i></span>
        </div>
        <div class="input-group flex-nowrap">
          <input type="password" name="senha2" class="form-control" placeholder="Repita senha" id="passwordFieldConfirm" required>
          <span class="input-group-text" id="togglePasswordConfirm"><i class="far fa-eye-slash"></i></span>
        </div>
        <div id="erroSenha" class="form-text text-danger mb-3" style="display: none;">Confira as senhas e tente novamente</div>
        <div id="senhaCurta" class="form-text text-danger mb-3" style="display: none;">As senhas devem ter ao menos 6 caracteres</div>
        <button type="submit" class="btn text-light clean-btn mt-3" id="btnCadastrar">Cadastrar</button>
      </form>

      <a href="?q=cadastro" class="card-link">Cadastrar-se</a>
    </div>
  </div>

</div>