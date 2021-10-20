# Projeto Lista de clientes e contatos

## Cadastro de clientes com contatos associados.
[![Bpxzjj.md.jpg](https://iili.io/Bpxzjj.md.jpg)](https://freeimage.host/i/Bpxzjj)

### Instalação:
Para executar esse projeto em seu local, siga os seguintes passos:

1- Clone o projeto em seu local;

    git clone https://github.com/fgpetter/projetoGestaoContatos.git

2- Acesse o arquivo /*config.php* e altere a variavel de ambiente "SITE_URL" para o link que você irá usar;
Caso queira manter como está, use o servidor imbutido do php rodando o comando:

    php -S localhost:8080 -t public
    
3- Crie uma base de dados MySQL e altere os dados de conexão no arquivo /*config.php*;

4- Copie e execute os comandos SQL que estão nos arquivos */ArquivosSQL/Usuários.sql, /ArquivosSQL/Clientes.sql, /ArquivosSQL/Contatos.sql* em seu software de gerenciamento MyQL(Ex PHP MyAdmin ou MySQL Workbench) para fazer a migração da base de exemplo;

5- Execute o composer:

    composer install

Está pronto para usar!

### Uso:
Login:

User: admin

Senha: admin


O sistema tem apenas uma tela e nela é possível fazer todas as tarefas de Visualização, Cadastro, Edição e Exclusão de Clientes e Contatos;

[![BpxuCQ.md.jpg](https://iili.io/BpxuCQ.md.jpg)](https://freeimage.host/i/BpxuCQ)
