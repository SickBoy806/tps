<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VoyagerTrainingProgramSeeder extends Seeder
{
    public function run()
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Proficiency Courses',
                'slug' => 'proficiency-courses',
            ],
            [
                'name' => 'Promotion Preparation Courses',
                'slug' => 'promotion-courses',
            ],
            [
                'name' => 'Basic Recruit Training',
                'slug' => 'recruit-courses',
            ],
            [
                'name' => 'UN Peacekeeping Preparation',
                'slug' => 'peacekeeping-courses',
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']], 
                [
                    'name' => $categoryData['name'],
                    'slug' => $categoryData['slug']
                ]
            );
        }

        // Modify BREAD for Posts
        $dataType = DataType::where('slug', 'posts')->first();

        // Custom fields for courses
        $customFields = [
            [
                'data_type_id' => $dataType->id,
                'field' => 'course_duration',
                'type' => 'text',
                'display_name' => 'Course Duration',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            [
                'data_type_id' => $dataType->id,
                'field' => 'course_level',
                'type' => 'text',
                'display_name' => 'Course Level',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ]
        ];

        // Check and add custom fields
        foreach ($customFields as $field) {
            $existingField = DataRow::where('data_type_id', $field['data_type_id'])
                ->where('field', $field['field'])
                ->first();

            if (!$existingField) {
                DataRow::create($field);
            }
        }
    }

    public function down()
    {
        // Optionally, remove the categories and custom fields
        Category::whereIn('slug', [
            'proficiency-courses', 
            'promotion-courses', 
            'recruit-courses', 
            'peacekeeping-courses'
        ])->delete();

        $dataType = DataType::where('slug', 'posts')->first();
        DataRow::where('data_type_id', $dataType->id)
            ->whereIn('field', ['course_duration', 'course_level'])
            ->delete();
    }
}