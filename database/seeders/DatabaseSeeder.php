<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(bannerSeeder::class);
        $this->call(iconSeeder::class);
        $this->call(productSeeder::class);
        $this->call(blogSeeder::class);
        $this->call(usuariosSeeder::class);
        $this->call(PartidasSeeder::class);
        $this->call(usuariospartidasSeeder::class);
    }
}
