<?php

use App\Model\Contenu_Sac\Baton;
use Illuminate\Database\Seeder;

class BatonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Baton::class, 1)->create();
    }
}
