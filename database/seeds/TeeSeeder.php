<?php

use App\Model\Contenu_Sac\Tee;
use Illuminate\Database\Seeder;

class TeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tee::class, 1)->create();
    }
}
