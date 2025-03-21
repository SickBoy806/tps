<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; // Add this import
use Illuminate\Support\Facades\Schema; // Add this import

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    // Define categories
    $categories = [
        'Research',
        'Academic',
        'Technology',
        'Events',
        'Achievements',
    ];
    
    // Insert categories
    foreach ($categories as $category) {
        Category::firstOrCreate(
            ['name' => $category],
            ['slug' => Str::slug($category)]
        );
    }
    
    // Check if the column exists and use the correct name
    $columnName = Schema::hasColumn('news', 'category') ? 'category' : 'category_name';
    
    // Update news table to associate category IDs
    if (Schema::hasColumn('news', $columnName)) {
        DB::statement("
            UPDATE news
            SET category_id = (
                SELECT id FROM categories
                WHERE categories.name = news.$columnName
                LIMIT 1
            )
            WHERE $columnName IS NOT NULL
        ");
    } else {
        // If the column doesn't exist, we may need to manually assign categories
        // You could add a default category or assign them based on some other logic
        echo "Column $columnName not found in news table. Please assign categories manually.\n";
    }
}
}