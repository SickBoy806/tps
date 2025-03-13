<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class AcademicController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function Academicblock()
    {
        // Get all facilities with their associated images
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
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/ict-lab.jpg',
                        'caption' => 'Main Computer Laboratory'
                    ]
                ]
            ],
            [
                'name' => 'Science Laboratories',
                'description' => 'Fully equipped modern science laboratories',
                'icon' => 'fas fa-flask',
                'features' => [
                    'Advanced Chemistry Lab',
                    'Physics Research Center',
                    'Biology Laboratory',
                    'Safety Equipment',
                    'Research Facilities'
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/science-lab.jpg',
                        'caption' => 'Science Laboratory'
                    ]
                ]
            ],
            [
                'name' => 'Modern Classrooms',
                'description' => 'Contemporary learning spaces with latest educational technology',
                'icon' => 'fas fa-chalkboard-teacher',
                'features' => [
                    'Smart Boards',
                    'Comfortable Seating',
                    'Modern Audio Systems',
                    'Climate Control',
                    'Optimal Lighting'
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/classroom.jpg',
                        'caption' => 'Modern Classroom'
                    ]
                ]
            ],
            [
                'name' => 'Library',
                'description' => 'Extensive collection of books and digital resources',
                'icon' => 'fas fa-book',
                'features' => [
                    'Digital Catalogs',
                    'Study Areas',
                    'Research Sections',
                    'Online Resources',
                    'Reading Rooms'
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/library.jpg',
                        'caption' => 'Main Library'
                    ]
                ]
            ],
            [
                'name' => 'Sports Facilities',
                'description' => 'Comprehensive sports and recreation facilities',
                'icon' => 'fas fa-futbol',
                'features' => [
                    'Football Field',
                    'Basketball Court',
                    'Swimming Pool',
                    'Indoor Sports Hall',
                    'Fitness Center'
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/sports.jpg',
                        'caption' => 'Sports Complex'
                    ]
                ]
            ],
            [
                'name' => 'Art Studio',
                'description' => 'Creative spaces for artistic expression',
                'icon' => 'fas fa-palette',
                'features' => [
                    'Painting Studio',
                    'Sculpture Workshop',
                    'Digital Art Lab',
                    'Exhibition Space',
                    'Art Materials'
                ],
                'images' => [
                    [
                        'path' => 'assets/images/facilities/art-studio.jpg',
                        'caption' => 'Art Studio'
                    ]
                ]
            ]
        ];
       
        {
            // Your facilities array definition...
            
            // Convert arrays to objects
            $facilitiesObjects = array_map(function($facility) {
                return (object)$facility;
            }, $facilities);
            
            return view('facilities.Academicblock', ['facilities' => $facilitiesObjects]);
        }
    }

    public function contactus()
    {
        return view('contactUs.contactus');
    }

    // Add other methods for different pages as needed
}

