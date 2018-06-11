
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
        'birth_date' => Carbon::now()->toDateTimeString(),
        'cpf' => '74957335192',
        'perfil' => 'ver'
      ]);
    }
}
