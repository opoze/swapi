
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin'),
        'birth_date' => Carbon::now()->Format('Y-m-d'),
        'cpf' => '74957335192',
        'perfil' => '1'
      ]);
      DB::table('users')->insert([
        'name' => 'Luis',
        'email' => 'luis@gmail.com',
        'password' => bcrypt('luis'),
        'birth_date' => Carbon::now()->format('Y-m-d'),
        'cpf' => '74957335292',
        'perfil' => '2'
      ]);
      DB::table('users')->insert([
        'name' => 'Alberto',
        'email' => 'alberto@gmail.com',
        'password' => bcrypt('alberto'),
        'birth_date' => Carbon::now()->format('Y-m-d'),
        'cpf' => '74957315292',
        'perfil' => '3'
      ]);
    }
}
