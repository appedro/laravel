Projeto em Laravel seguindo as instruções da equipe de T.I.
# Instruções
Primeiramente faça o git clone dos arquivos do repositório de preferência em uma pasta de servidor local. Execute o comando no terminal no diretório mencionado.
```
git clone https://github.com/PedroGuilhermeSouza/teste-laravel
```
Após conter os arquivos localmente, execute os comandos de gereciamento de dependências.  Execute o comando no terminal no diretório do diretorio mencionado no passo anterior.

```
composer install
npm install
```

Depois disso você precisará copiar um arquivo .env. Faça uma cópia de .env.example para .env.

Depois de fazer a copia, configure seu arquivo .env de acordo com suas configurações do banco de dados. Após isso, encripte o seu arquivo .env:
```
php artisan key:generate
```
Depois de ter o arquivo .env pronto, faça as migrações:
```
php artisan migrate
```
Para iniciar o webserver, execute o seguinte comando no diretório que estamos trabalhando:
```
php artisan serve
```

# Rotas
Abaixo estão listadas as rotas e suas funções. Caso prefira rode o comando:
```
php artisan route:list
```
- servidorlocal/user/create - Formulário de cadastro
- servidorlocal/user/{id}/edit - Formulário de atualização de dados
- servidorlocal/api/user/{id} - API que retorna o usuário
- servidorlocal/user/{id} - Tabela com os dados do usuário
