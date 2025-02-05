# Implementação de Níveis de Acesso no Laravel 10

Este projeto implementa um sistema de controle de permissões utilizando **Laravel Gates** e **Middleware**.

<h2>Links Uteis</h2>

**[Video](https://www.youtube.com/watch?v=R8gujLWDwwo&t=712s)**

**[Materia...](https://medium.com/@contato.marcosrf/como-implementar-níveis-de-acesso-no-seu-sistema-laravel-laravel-10-ca73b1ffa52d)**


## Requisitos
- PHP 8+
- Laravel 10
- Banco de Dados configurado (SQLite, MySQL, PostgreSQL, etc.)

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/malobr/Permission-Laravel.git
   
   cd backend
   ```

2. Instale as dependências:
   ```sh
   composer install
   ```

3. Configure o arquivo `.env`:
   ```sh
   cp .env.example .env
   ```
   Atualize as configurações do banco de dados no `.env`.

4. Gere a chave da aplicação:
   ```sh
   php artisan key:generate
   ```

5. Execute as migrações para criar as tabelas necessárias:
   ```sh
   php artisan migrate
   ```

## Estrutura do Banco de Dados

O sistema utiliza duas tabelas principais para controle de permissões:

- `permissions`: Armazena as permissões disponíveis.
- `permission_user`: Tabela pivot que faz a relação entre `users` e `permissions`.

## Modelos e Relacionamentos

### `User.php`
```php
public function permissions(): BelongsToMany
{
    return $this->belongsToMany(Permission::class);
}

public function assignPermission(string $permission): void
{
    $permission = $this->permissions()->firstOrCreate(['name' => $permission]);
    $this->permissions()->attach($permission);
}

public function hasPermission(string $permission): bool
{
    return $this->permissions()->where('name', $permission)->exists();
}
```

## Configuração dos Gates

Dentro do `App\Providers\AuthServiceProvider.php`:
```php
Gate::define('admin', function (User $user) {
    return $user->hasPermission('admin');
});

Gate::define('default', function (User $user) {
    return $user->hasPermission('manage-users');
});
```

## Uso nos Controllers

Dentro do `PermissionController.php`:
```php
Gate::authorize('admin');
return 'Você é um admin';
```

## Middleware para Rotas

```php
Route::get('/test-permission', PermissionController::class)
    ->middleware('auth', 'can:admin');
```

## Verificação no Blade

```blade
@can('admin')
    <h1>Você é admin</h1>
@endcan
```



