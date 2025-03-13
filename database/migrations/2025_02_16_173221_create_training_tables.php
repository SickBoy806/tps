<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->text('detailed_description');
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('media_url')->nullable();
            $table->string('media_thumbnail_url')->nullable();
            $table->string('media_alt_text')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('training_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('value');
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_programs');
        Schema::dropIfExists('training_statistics');
    }
};