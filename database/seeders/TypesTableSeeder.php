<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Web', 'Mobile', 'Desktop', 'Cloud', 'All'];

        foreach ($types as $type) {
            $newTypes = new Type();
            $newTypes->name = $type;
            $newTypes->save();
        }
    }
}
