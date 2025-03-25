<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseFieldsToPosts extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Only add if not exists
            if (!Schema::hasColumn('posts', 'course_duration')) {
                $table->string('course_duration')->nullable();
            }
            if (!Schema::hasColumn('posts', 'course_level')) {
                $table->string('course_level')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumnIfExists('course_duration');
            $table->dropColumnIfExists('course_level');
        });
    }
}