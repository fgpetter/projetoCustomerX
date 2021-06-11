<nav class="navbar navbar-light bg-light mb-5">
  <div class="container">
    <span class="navbar-brand mb-0">
      <h2 class="logo"><strong>Customer</strong>X</h2>
    </span>
  </div>
</nav>

<div class="container d-flex align-items-center" style="height: 75vh;">

  <div class="card mx-auto">
    
    <?php if(isset($_SESSION['flash-message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash-message']['tipo']; ?> alert-dismissible fade show" role="alert" id="alert">
        <?= $_SESSION['flash-message']['mensagem']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['flash-message']); endif; ?>

    <div class="card-body" style="width: 24rem;">
      <h5 class="card-title logo py-3"><strong>Faça login para acessar:</strong></h5>

      <form action="?q=logon" method="POST" class="mb-3">
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
        </div>
        <div class="input-group flex-nowrap mb-3">
          <input type="password" name="senha" class="form-control" placeholder="Sua senha" id="passwordField" required>
          <span class="input-group-text" id="togglePassword"><i class="far fa-eye-slash"></i></span>
        </div>
        <button type="submit" class="btn text-light clean-btn">Login</button>
      </form>

      <a href="?q=cadastro" class="card-link">Cadastrar-se</a>
    </div>
  </div>

</div>