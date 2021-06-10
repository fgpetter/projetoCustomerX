<nav class="navbar navbar-light bg-light mb-5">
  <div class="container">
    <span class="navbar-brand mb-0">
      <h2 class="logo"><strong>Customer</strong>X</h2>
    </span>
  </div>
</nav>



<div class="container mb-5">

  <?php if(isset($_SESSION['flash-message'])): ?>
    <div class="alert alert-<?= $_SESSION['flash-message']['tipo']; ?> alert-dismissible fade show" role="alert" id="alert">
      <?= $_SESSION['flash-message']['mensagem']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php unset($_SESSION['flash-message']); endif; ?>

  <div class="card">
    <div class="card-body">
      <h3 class="card-title my-3 px-1">Clientes CustomerX</h3>
      <hr class="mb-4"> 
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button novo-cliente collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <i class="fas fa-plus"></i> &nbsp; CRIAR NOVO CLIENTE  
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

              <!-- Cadastrar Cliente -->
              <form action="?q=cadastrar-cliente" method="post">
                <div class="row my-2">
                  <div class="col">
                    <input type="text" class="form-clean" name="nome" placeholder="Nome do cliente">
                  </div>
                  <div class="col">
                    <input type="text" class="form-clean" name="email" placeholder="Email">
                  </div>
                  <div class="col">
                    <input type="text" class="form-clean" name="telefone"  placeholder="Telefone">
                  </div>
                  <div class="col col-sm-2 text-end">
                    <input class="btn btn-sm text-light form-clean-btn" type="submit" value="Cadastrar">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

        <?php if($clientes): ?>
        <?php foreach($clientes as $cliente): ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= str_replace(' ', '-', $cliente->nome) ?>" aria-expanded="false" aria-controls="<?= str_replace(' ', '-', $cliente->nome) ?>">
                <?= $cliente->nome ?>
              </button>
            </h2>
            <div id="<?= str_replace(' ', '-', $cliente->nome) ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">

                <!-- Atualizar Cliente -->
                <form action="?q=atualizar-cliente" method="post">
                  <div class="row my-2">
                    <div class="col">
                      <input type="hidden" name="id" value="<?= $cliente->id ?>">
                      <input class="form-clean" type="text" name="nome" value="<?= $cliente->nome ?>">
                    </div>
                    <div class="col">
                      <input class="form-clean" type="text" name="email" value="<?= $cliente->email ?>">
                    </div>
                    <div class="col">
                      <input class="form-clean" type="text" name="telefone" value="<?= $cliente->telefone ?>">
                    </div>
                    <div class="col">
                      <input class="form-clean" type="text" name="data_registro" value="<?= $cliente->data_registro ?>" disabled>
                    </div>
                    <div class="col col-sm-2 text-end">
                      <input class="btn btn-sm text-light form-clean-btn" type="submit" value="Atualizar">
                      <input class="btn btn-sm text-light form-clean-btn remover" onclick="confirmaRemocao()" formaction="?q=remover-cliente" type="submit" value="Remover">
                    </div>
                  </div>
                </form>

                <hr class="my-4">
                <!-- Lista de contatos -->
                <h5> CONTATOS: </h5>
                <!-- Cadastrar contato -->
                <form class="mb-3" action="?q=cadastrar-contato" method="post">
                  <div class="row my-2">
                    <div class="col">
                      <input type="hidden" name="cliente_id" value="<?= $cliente->id ?>">
                      <input type="text" class="form-clean cadastrar" name="nome" placeholder="Nome do contato">
                    </div>
                    <div class="col">
                      <input type="text" class="form-clean cadastrar" name="email" placeholder="Email">
                    </div>
                    <div class="col">
                      <input type="text" class="form-clean cadastrar" name="telefone"  placeholder="Telefone">
                    </div>
                    <div class="col col-sm-2 text-end">
                      <input class="btn btn-sm text-light form-clean-btn cadastrar" type="submit" value="Cadastrar">
                    </div>
                  </div>
                </form>
                <?php foreach($contatos as $contato): ?>
                  <?php if($contato->cliente_id == $cliente->id): ?>
                    <form action="?q=atualizar-contato" method="post">
                      <div class="row my-2">
                        <div class="col">
                          <input type="hidden" name="id" value="<?= $contato->id ?>">
                          <input class="form-clean" type="text" name="nome" value="<?= $contato->nome ?>">
                        </div>
                        <div class="col">
                          <input class="form-clean" type="text" name="email" value="<?= $contato->email ?>">
                        </div>
                        <div class="col">
                          <input class="form-clean" type="text" name="telefone" value="<?= $contato->telefone ?>">
                        </div>
                        <div class="col col-sm-2 text-end">
                          <input class="btn btn-sm text-light form-clean-btn" type="submit" value="Atualizar">
                          <input class="btn btn-sm text-light form-clean-btn remover" formaction="?q=remover-contato" type="submit" value="Remover">
                        </div>
                      </div>
                    </form>
                  <?php endif; ?>
                <?php endforeach; ?>                
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>

</div>