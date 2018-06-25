<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SupliersTableSeeder::class);
        $this->call(ProposalsTableSeeder::class);
        $this->call(ProposalStatusTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
    }
}
