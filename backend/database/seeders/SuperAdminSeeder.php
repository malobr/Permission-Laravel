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
        // Criar a permissão "gerenciar tudo"
        $permission = Permission::firstOrCreate(['name' => 'gerenciar tudo']);

        // Criar a role "SuperAdmin" e atribuir a permissão
        $role = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $role->givePermissionTo($permission);

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
