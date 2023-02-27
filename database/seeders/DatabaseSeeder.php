<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::updateOrCreate([
            'name' => 'Mohamad Yuzrie Bin Khalid',
            'email' => 'mohamadyuzrie@gmail.com',
            'password' => bcrypt('yuzrie'),
        ]);
    }
}
