
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SupliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('supliers')->insert([
        'name' => 'Google',
        'email' => 'google@google.com',
        'fone' => '(555)(555)5555-5555',
        'cnpj' => '07627793000112'
      ]);

      DB::table('supliers')->insert([
        'name' => 'SafeWeb',
        'email' => 'sw@sw.com',
        'fone' => '(555)(051)5555-4444',
        'cpf' => '96009742099'
      ]);
    }
}
