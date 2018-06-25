
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('proposals')->insert([
        'name' => 'Proposta 1',
        'category' => '1',
        'suplier' => '1',
        'value' => '20000',
        'file' => 'proposta1.pdf',
        'description' => 'proposta 1',
        'created_at' => Carbon::now()
      ]);

      DB::table('proposals')->insert([
        'name' => 'Proposta 2',
        'category' => '1',
        'suplier' => '1',
        'value' => '10000',
        'file' => 'proposta2.pdf',
        'description' => 'proposta 2',
        'created_at' => Carbon::now()
      ]);

    }
}
