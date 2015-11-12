<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(HotelsPackageTableSeeder::class);
        $this->call(HotelsResourceTableSeeder::class);
        $this->call(HotelsPublicationTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="HotelsTableSeeder"
 */