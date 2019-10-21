<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crearusuario = $this->command->ask('Desea crear un usuario administrador? (y)si (n)no');
        if ($crearusuario == 'y') {
            $role = Role::where('name', 'super-administrador')->first();
            $user = array();
            $this->command->comment('');
            $this->command->comment('Se creara el rol ' . $role->uiname .'.');
            $this->command->info('...................................');

            // DATOS USUARIO
            $user['username'] = $this->command->ask('ingrese username');
            $user['email'] = $this->command->ask('Correo del usuario super-admin?');
            $pass = false;
            $password = '';
            while ($pass != true) {
                $password = $this->command->secret('Password');
                $pass = $password === $this->command->secret('confirma');
                if ($pass === false) {
                    $this->command->info('las contraseñas no coinciden.');
                } else {
                    $user['password'] = bcrypt($password);
                }
            }

            // // DATOS PERSONA
            // $persona['nombre'] = $user['nombre'];
            // $persona['paterno'] = $user['paterno'];
            // $persona['materno'] = $user['materno'];
            // $persona['correo'] = $user['email'];
            // $persona['sexo_id'] = 1;
            // $persona['fecha_nacimiento'] = '1991-11-06';
            // $persona = Persona::firstorcreate($persona);

            $user['persona_id'] = null;
            $adminUser = User::firstorcreate($user);
            $adminUser->assignRole($role);
        } else {
            $this->command->comment('Tranquilo viejo, continuemos....');
        }
    }
}
