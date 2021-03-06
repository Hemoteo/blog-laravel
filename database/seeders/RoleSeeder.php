<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        // Dashboard home
        Permission::create([
            'name' => 'admin.home', 'description' => 'Ver el dashboard',
        ])->syncRoles([$role1, $role2]);

        // Users
        Permission::create([
            'name' => 'admin.users.index', 'description' => 'Ver lista de usuarios',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit', 'description' => 'Asignar roles',
        ])->syncRoles([$role1]);

        // Roles
        Permission::create([
            'name' => 'admin.roles.index', 'description' => 'Ver lista de roles',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.create', 'description' => 'Crear rol',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.edit', 'description' => 'Editar rol',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.destroy', 'description' => 'Eliminar rol',
        ])->syncRoles([$role1]);

        // Categories
        Permission::create([
            'name' => 'admin.categories.index', 'description' => 'Ver lista de categorías',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.categories.create', 'description' => 'Crear categoría',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.edit', 'description' => 'Editar categoría',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.categories.destroy', 'description' => 'Eliminar categoría',
        ])->syncRoles([$role1]);

        // Tags
        Permission::create([
            'name' => 'admin.tags.index', 'description' => 'Ver lista de etiquetas',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.tags.create', 'description' => 'Crear etiqueta',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.edit', 'description' => 'Editar etiqueta',
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.tags.destroy', 'description' => 'Eliminar etiqueta',
        ])->syncRoles([$role1]);

        // Posts
        Permission::create([
            'name' => 'admin.posts.index', 'description' => 'Ver lista de posts',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.create', 'description' => 'Crear post',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.edit', 'description' => 'Editar post',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.posts.destroy', 'description' => 'Eliminar post',
        ])->syncRoles([$role1, $role2]);
    }
}
