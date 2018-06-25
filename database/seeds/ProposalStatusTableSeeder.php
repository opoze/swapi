
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProposalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('proposal_status')->insert([
        'status' => 'A',
        'user' => '1',
        'proposal' => '1',
        'created_at' => Carbon::now()->toDateTimeString()
      ]);

    }
}
