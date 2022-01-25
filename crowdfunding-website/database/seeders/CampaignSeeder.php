<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::create([
            'title'         => 'Judul 1',
            'description'   => 'Desc 1',
            'image'         => 'https://dummyimage.com/1920x1080/000/fff',
            'address'       => 'alamattnyaaa',
            'required'      => 5000,
            'collected'     => 1000
        ]);
        Campaign::create([
            'title'         => 'Judul 1',
            'description'   => 'Desc 1',
            'image'         => 'https://dummyimage.com/1920x1080/000/fff',
            'address'       => 'alamattnyaaa',
            'required'      => 5000,
            'collected'     => 6000
        ]);
        
        
    }
}
