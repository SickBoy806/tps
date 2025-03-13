<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        $facilities = [
            [
                'name' => 'ICT Facilities',
                'description' => 'State-of-the-art computer labs and digital learning resources',
                'icon' => 'fas fa-desktop',
                'features' => [
                    'Modern Computer Labs',
                    'High-Speed Internet',
                    'Interactive Smartboards',
                    'Digital Library Access',
                    'Multimedia Studio'
                ]
            ],
            [
                'name' => 'Science Laboratories',
                'description' => 'Fully equipped laboratories for Physics, Chemistry, and Biology',
                'icon' => 'fas fa-flask',
                'features' => [
                    'Advanced Lab Equipment',
                    'Safety Protocols',
                    'Research Facilities',
                    'Modern Instruments',
                    'Experimental Stations'
                ]
            ],
            // Add more facilities as needed
        ];

        foreach ($facilities as $facility) {
            $newFacility = Facility::create($facility);
            
            // Add sample images for each facility
            $newFacility->images()->create([
                'image_path' => 'facilities/default.jpg', // Replace with actual image path
                'caption' => $facility['name'] . ' Laboratory'
            ]);
        }
    }
}