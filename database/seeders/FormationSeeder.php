<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'id' => $i + 1,
                'name' => 'Formation num ' . $i + 1,
                'date' => Carbon::today()->addDays($i),
                'description' => ' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis, corrupti. Rerum totam deserunt ex voluptates aperiam dolor tenetur? Odit beatae hic obcaecati magni soluta adipisci ipsam ipsa repellendus, ab vel.',
                'link' => 'google.com',
            ];
        }

        // mass insert
        Formation::upsert($data, ['id']);
    }
}
