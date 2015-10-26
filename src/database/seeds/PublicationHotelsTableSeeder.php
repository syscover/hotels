<?php

use Illuminate\Database\Seeder;
use Syscover\Hotels\Models\Publication;

class PublicationHotelsTableSeeder extends Seeder {

    public function run()
    {
        Publication::insert([
            ['id_174' => 1,     'name_174' => 'Web'],
            ['id_174' => 2,     'name_174' => 'The Country Chef'],
            ['id_174' => 3,     'name_174' => 'Ruralka On Road']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="PublicationHotelsTableSeeder"
 */