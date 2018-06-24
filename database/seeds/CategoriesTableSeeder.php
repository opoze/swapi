
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'name' => 'Financeiro',
        'description' => 'Categoria Financeira'
      ]);

      DB::table('categories')->insert([
        'name' => 'Ajustes',
        'description' => 'Categoria para ajustes'
      ]);
    }
}
