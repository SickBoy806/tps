<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // If you already have a category column in your news table,
        // you'll need to create a foreign key relationship
        Schema::table('news', function (Blueprint $table) {
            // If you already have a category column, rename it to category_id
            // and change its type to unsignedBigInteger
            if (Schema::hasColumn('news', 'category')) {
                $table->renameColumn('category', 'category_name');
            }
            
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            
            if (Schema::hasColumn('news', 'category_name')) {
                $table->renameColumn('category_name', 'category');
            }
        });

        Schema::dropIfExists('categories');
    }
}