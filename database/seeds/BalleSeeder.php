<?php

use App\Model\Contenu_Sac\Balle;
use Illuminate\Database\Seeder;

class BalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Balle::class, 1)->create();
    }
}
