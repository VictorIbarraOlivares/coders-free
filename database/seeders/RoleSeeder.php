<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);
        
        $role->permissions()->attach( Permission::all()->pluck('id')->toArray() );

        $role = Role::create(['name' => 'Instructor']);

        $role->syncPermissions([
            'Crear cursos', 'Leer cursos', 'Actualizar cursos', 'Eliminar cursos'
        ]);


    }
}
