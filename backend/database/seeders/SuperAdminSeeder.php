<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Lista de permissões baseadas nas rotas fornecidas
        $permissions = [
            // Permissions
            'permissions.index', 'permissions.create', 'permissions.store', 'permissions.edit', 'permissions.update', 'permissions.destroy',
            
            // Roles
            'roles.index', 'roles.create', 'roles.store', 'roles.edit', 'roles.update', 'roles.destroy',
            
            // Articles
            'articles.index', 'articles.create', 'articles.store', 'articles.edit', 'articles.update', 'articles.destroy',
            
            // Users
            'users.index', 'users.create', 'users.store', 'users.edit', 'users.update', 'users.destroy',
        ];

        // Criar permissões no banco de dados
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Criar a role "SuperAdmin" e atribuir todas as permissões
        $role = Role::firstOrCreate(['name' => 'superadmin']);
        $role->syncPermissions($permissions);

        // Criar um usuário e atribuir a role de SuperAdmin
        $user = User::firstOrCreate(
            ['email' => 'superadmin@teste.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'), // Defina uma senha segura
            ]
        );

        $user->assignRole($role);

        $this->command->info('Usuário SuperAdmin criado com sucesso!');
    }
}
