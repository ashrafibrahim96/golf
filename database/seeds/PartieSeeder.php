<?php

use App\Model\Score\Partie;
use Illuminate\Database\Seeder;

class PartieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Partie::class, 10)->create();

    }
}
