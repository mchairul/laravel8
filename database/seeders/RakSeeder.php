<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Rak;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rak::create([
            'name' => 'Rak 1',
        ]);
    }
}
