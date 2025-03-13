<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->id();
            $table->string('internship_id');
            $table->string('internship_title');
            $table->string('full_name');
            $table->string('email');
            $table->string('resume_path')->nullable();
            $table->text('motivation')->nullable();
            $table->enum('status', [
                'pending', 
                'reviewed', 
                'accepted', 
                'rejected'
            ])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_applications');
    }
}