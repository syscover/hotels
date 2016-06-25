<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class HotelsResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'hotels',              'name_007' => 'Hotels Package', 'package_id_007' => '7'],
            ['id_007' => 'hotels-hotel',        'name_007' => 'Hotels',         'package_id_007' => '7'],
            ['id_007' => 'hotels-room',         'name_007' => 'Rooms',          'package_id_007' => '7'],
            ['id_007' => 'hotels-environment',  'name_007' => 'Environments',   'package_id_007' => '7'],
            ['id_007' => 'hotels-decoration',   'name_007' => 'Decorations',    'package_id_007' => '7'],
            ['id_007' => 'hotels-relationship', 'name_007' => 'Relationship',   'package_id_007' => '7'],
            ['id_007' => 'hotels-service',      'name_007' => 'Services',       'package_id_007' => '7'],
            ['id_007' => 'hotels-publication',  'name_007' => 'Publications',   'package_id_007' => '7'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="HotelsResourceTableSeeder"
 */