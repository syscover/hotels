<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(ResourceHotelsTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="HotelsTableSeeder"
 */