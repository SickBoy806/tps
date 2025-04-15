<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'title' => 'Procurement Department',
                'description' => 'The Procurement Department is responsible for the acquisition of goods and services needed by the Tanzania Police Force. This department ensures transparency, fairness, and compliance with government regulations in all procurement processes.',
                'category' => 'admin',
                'leadership' => 'Currently headed by ACP Francis Mwema',
                'responsibilities' => json_encode([
                    'Managing tender processes for police equipment and services',
                    'Maintaining relationships with suppliers and contractors',
                    'Ensuring value for money in all acquisitions',
                    'Keeping inventory of procured items',
                    'Developing procurement policies and procedures'
                ]),
                'icon' => '📋'
            ],
            [
                'title' => 'Administration And Human Resources',
                'description' => 'The Administration and Human Resources department oversees personnel management, recruitment, training, and overall administrative functions of the Tanzania Police Force.',
                'category' => 'admin',
                'leadership' => 'Currently headed by DCP Elizabeth Mushi',
                'responsibilities' => json_encode([
                    'Staff recruitment and selection processes',
                    'Performance management and career development',
                    'Payroll administration and benefits management',
                    'Management of disciplinary procedures',
                    'Handling transfers and promotions',
                    'Employee welfare and relations'
                ]),
                'icon' => '👥'
            ],
            [
                'title' => 'Military and Defence Training',
                'description' => 'This specialized department focuses on providing tactical and strategic training to enhance the defensive capabilities of police officers, especially those dealing with high-risk situations.',
                'category' => 'training',
                'leadership' => 'Currently headed by SSP James Kilonzo',
                'responsibilities' => json_encode([
                    'Physical fitness and combat training',
                    'Weapons handling and tactical operations',
                    'Counter-terrorism techniques',
                    'Special operations procedures',
                    'Field survival skills'
                ]),
                'icon' => '🛡️'
            ],
            // Add remaining departments from the original HTML
            // Example:
            [
                'title' => 'Information and Technology (IT)',
                'description' => 'The IT Department develops and maintains technological infrastructure and systems to support modern policing activities and administrative functions.',
                'category' => 'training support',
                'leadership' => 'Currently headed by SP Maria Komba',
                'responsibilities' => json_encode([
                    'Maintaining police networks and computer systems',
                    'Developing security protocols for digital information',
                    'Supporting criminal database management',
                    'Implementing new technologies for policing',
                    'Training staff on IT systems and cybersecurity'
                ]),
                'icon' => '💻'
            ],
            // ... Continue with all departments
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}