<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->json('responsibilities');
            $table->integer('display_order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaders');
    }
};
