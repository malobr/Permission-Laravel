# Implementando Permissões no Laravel

## Requisitos

- PHP 8+
- Composer
- MySQL ou SQLite
- Node.js e NPM (para o frontend, caso aplicável)

## Passo a Passo

### 1. Clonar o Projeto

```bash
git clone https://github.com/seu-repositorio/seu-projeto.git
cd seu-projeto
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

### 4. Criar o Banco de Dados e Rodar as Migrations

```bash
php artisan migrate --seed
```

### 5. Instalar e Configurar o Spatie Permissions

```bash
composer require spatie/laravel-permission
```

Publique a configuração:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

Rode as migrations:

```bash
php artisan migrate
```

### 6. Configurar o Middleware e Models

No modelo `User.php`, adicione:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
}
```

No `config/auth.php`, altere o `guard_name` para `web`:

```php
'secondary_guard_name' => 'web',
```

### 7. Criar Permissões e Roles no Seeder

No arquivo `DatabaseSeeder.php`:

```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

public function run()
{
    $adminRole = Role::create(['name' => 'admin']);
    $userRole = Role::create(['name' => 'user']);
    
    $manageUsers = Permission::create(['name' => 'manage users']);
    $adminRole->givePermissionTo($manageUsers);

    $user = User::find(1);
    $user->assignRole('admin');
}
```

Rode novamente os seeders:

```bash
php artisan db:seed
```

### 8. Testar as Permissões no Controller

```php
if (auth()->user()->can('manage users')) {
    return 'Você tem permissão!';
} else {
    return 'Acesso negado';
}
```

### 9. Configurar Gates no `AppServiceProvider.php`

```php
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

public function boot()
{
    Permission::all()->each(function ($permission) {
        Gate::define($permission->name, function ($user) use ($permission) {
            return $user->hasPermissionTo($permission);
        });
    });
}
```

### 10. Inicializar o Servidor

```bash
php artisan serve
```

Agora, você pode acessar o projeto no navegador e testar as permissões!

---

<a href="#inicio">Voltar ao início</a>

