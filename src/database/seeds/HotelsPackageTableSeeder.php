<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class HotelsPackageTableSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id_012' => '7', 'name_012' => 'Hotels Package', 'folder_012' => 'hotels', 'sorting_012' => 7, 'active_012' => false]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="HotelsPackageTableSeeder"
 */