<h3 id="inicio"></h3>

# Implementando Permissões no Laravel 11

### Requisitos
Para um entendimento melhor, aqui esta o link da Playlist em que o projeto foi baseado...
[Link da playlist](https://youtube.com/playlist?list=PLRB0wzP8AS_GfoZTiqsY1397H8LcXgkMZ&si=d-B_vnTrxIk4d79E)

- PHP 8+
- Composer
- MySQL ou SQLite
- Node.js e NPM (para o frontend, caso aplicável)

## Passo a Passo

### 1. Clonar o Projeto

```bash
git clone https://github.com/malobr/Permission-Laravel.git
cd backend
```

### 2. Instalar Dependências

```bash
composer install
npm install && npm run build
```

### 3. Configurar o Ambiente

Copie o arquivo de exemplo `.env` e configure suas credenciais de banco de dados:

```bash
cp .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure suas credenciais no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```



### 4. Instalar e Configurar o Spatie Permissions

```bash
composer require spatie/laravel-permission
```

Publique a configuração:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
Ou caso prefira...

```bash
  php artisan vendor:publish --tag="permission-migrations"
```

### 5. Criar o Banco de Dados e Rodar as Migrations

```bash
php artisan migrate 
```

### 6. Rodar a Seed

```bash
php artisan db:seed --class=SuperAdminSeeder
```

Isso criará:

 -  Uma permissão `gerenciar tudo`  
 -  Uma role `SuperAdmin` com essa permissão  
 -  Um usuário com e-mail `superadmin@teste.com` e senha `12345678`  
 -  Esse usuário terá a role de `SuperAdmin`

### 7. Limpar o cache e Inicializar o Servidor

```bash
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
php artisan serve

```









<a href="#inicio">Voltar ao início</a>

