<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('user_name')->nullable();
            $table->string('location')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('gravatar_email')->nullable();
            $table->string('bio', 1000)->nullable();
            $table->boolean('is_profile_public')->default(1);
            $table->string('user_bio_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile');
    }
}
