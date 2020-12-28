<?php

use App\Model\Trou;
use Illuminate\Database\Seeder;

class TrouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Trou::class, 10)->create();
    }
}
