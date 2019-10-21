<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // USUARIOS
            [
                'name' => 'user-list',
                'uiname' => 'Listar de usuarios',
                'descripcion' => 'Puede ver la lista de usuarios'
            ],
            [
                'name' => 'user-create',
                'uiname' => 'Crear usuarios',
                'descripcion' => 'Puede generar nuevos usuarios'
            ],
            [
                'name' => 'user-edit',
                'uiname' => 'Actualizar usuarios',
                'descripcion' => 'Puede actualizar los datos de los usuarios'
            ],
            [
                'name' => 'user-delete',
                'uiname' => 'Eliminar usuarios',
                'descripcion' => 'Puede eliminar usuarios'
            ],
            [
                'name' => 'user-role-list',
                'uiname' => 'Ver roles del usuario',
                'descripcion' => 'Puede ver la lista de roles asignados a los usuarios'
            ],
            [
                'name' => 'user-role-update',
                'uiname' => 'Asignar roles a usuarios',
                'descripcion' => 'Puede asignar roles a los usuarios'
            ],
            [
                'name' => 'user-permission-list',
                'uiname' => 'Ver permisos del usuario',
                'descripcion' => 'Puede ver la lista de permisos asignados a los usuarios'
            ],
            [
                'name' => 'user-permission-update',
                'uiname' => 'Asignar permisos a usuarios',
                'descripcion' => 'Puede asignar pemrisos a los usuarios'
            ],
            // ROLES
            [
                'name' => 'role-list',
                'uiname' => 'Listar los roles',
                'descripcion' => 'Puede ver la lista de roles'
            ],
            [
                'name' => 'role-create',
                'uiname' => 'Crear roles',
                'descripcion' => 'Puede generar nuevos roles'
            ],
            [
                'name' => 'role-edit',
                'uiname' => 'Actualizar roles',
                'descripcion' => 'Puede actualizar los datos de lo roles'
            ],
            [
                'name' => 'role-delete',
                'uiname' => 'Eliminar roles',
                'descripcion' => 'Puede eliminar roles'
            ],
            [
                'name' => 'role-permission-list',
                'uiname' => 'Ver permisos del rol',
                'descripcion' => 'Puede ver la lista de permisos asignados a los roles'
            ],
            [
                'name' => 'role-permission-update',
                'uiname' => 'Asignar permisos a roles',
                'descripcion' => 'Puede asignar pemrisos a los roles'
            ],
            // PERMISOS
            [
                'name' => 'permission-list',
                'uiname' => 'Listar los permisos',
                'descripcion' => 'Puede ver la lista de permisos'
            ],
            [
                'name' => 'permission-create',
                'uiname' => 'Crear permisoss',
                'descripcion' => 'Puede generar nuevos permisos'
            ],
            [
                'name' => 'permission-edit',
                'uiname' => 'Actualizar permisos',
                'descripcion' => 'Puede actualizar los datos de los permisos'
            ],
            [
                'name' => 'permission-delete',
                'uiname' => 'Eliminar permisos',
                'descripcion' => 'Puede eliminar permisos'
            ],
        ];

        $role = [
            'name' => 'super-administrador',
            'uiname' => 'Super Administrador',
            'descripcion' => 'Cuenta con todos los permisos.'
        ];

        $mRole = new Role;
        $nRole = $mRole->firstOrCreate($role);
        $permissionA = [];
        $index = 0;
        foreach ($permissions as $permission) {


            $permM = Permission::firstOrCreate($permission);
            $permissionA[$index] = $permM->name;
            $index++;
        }
        $nRole->syncPermissions($permissionA);



    }
}
