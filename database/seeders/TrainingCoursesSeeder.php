<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\User;
use Illuminate\Support\Str;

class TrainingCoursesSeeder extends Seeder
{
    public function run()
    {
        // Proficiency Courses
        $this->createCourse(
            'proficiency-courses',
            'Advanced Tactical Operations',
            'Specialized training in high-risk scenario management and advanced tactical response.',
            '6 Weeks',
            'Advanced',
            'tactical-training.jpg'
        );

        $this->createCourse(
            'proficiency-courses',
            'Forensic Investigation Mastery',
            'Comprehensive forensic techniques and crime scene analysis.',
            '8 Weeks',
            'Specialized',
            'forensics-training.jpg'
        );

        // Promotion Courses
        $this->createCourse(
            'promotion-courses',
            'Leadership and Management',
            'Strategic leadership skills for law enforcement supervisors and managers.',
            '12 Weeks',
            'Executive',
            'leadership-training.jpg'
        );

        $this->createCourse(
            'promotion-courses',
            'Strategic Command Course',
            'Advanced leadership and decision-making for senior officers.',
            '10 Weeks',
            'Senior',
            'command-strategy.jpg'
        );

        // Recruit Courses
        $this->createCourse(
            'recruit-courses',
            'Basic Law Enforcement Academy',
            'Comprehensive foundational training for new law enforcement recruits.',
            '16 Weeks',
            'Entry',
            'recruit-training.jpg'
        );

        $this->createCourse(
            'recruit-courses',
            'Physical and Tactical Fundamentals',
            'Physical fitness, self-defense, and basic tactical skills.',
            '8 Weeks',
            'Foundation',
            'physical-training.jpg'
        );

        // Peacekeeping Courses
        $this->createCourse(
            'peacekeeping-courses',
            'UN Peacekeeping Mission Readiness',
            'Comprehensive preparation for international peacekeeping missions.',
            '10 Weeks',
            'International',
            'peacekeeping-training.jpg'
        );

        $this->createCourse(
            'peacekeeping-courses',
            'Cross-Cultural Conflict Resolution',
            'Advanced communication and mediation skills for international missions.',
            '6 Weeks',
            'Specialized',
            'conflict-resolution.jpg'
        );
    }

    private function createCourse($categorySlug, $title, $excerpt, $duration, $level, $imageName)
    {
        $category = Category::where('slug', $categorySlug)->first();
        
        if (!$category) {
            throw new \Exception("Category '$categorySlug' not found");
        }

        // Get the first user as the author (or create one if no users exist)
        $author = User::first();
        if (!$author) {
            $author = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role_id' => 1 // Typically the admin role
            ]);
        }

        // Placeholder image path - adjust as needed
        $imagePath = 'courses/' . $imageName;

        $post = Post::firstOrCreate([
            'title' => $title,
            'slug' => Str::slug($title),
        ], [
            'excerpt' => $excerpt,
            'category_id' => $category->id,
            'status' => 'PUBLISHED',
            'course_duration' => $duration,
            'course_level' => $level,
            'image' => $imagePath,
            'author_id' => $author->id // Add the author ID
        ]);
    }
}