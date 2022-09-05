<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(config('maggomann.addressable.tables.address_genders'), function (Blueprint $table) {
            $table->id();
            $table->string('title_translation_key');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create(config('maggomann.addressable.tables.addresses'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id')->nullable()->index();
            $table->morphs('addressable');
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('name')->nullable()->index();
            $table->string('street')->nullable();
            $table->string('street_addition')->nullable();
            $table->string('street_address')->nullable();
            $table->string('label')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country_code', 2)->nullable()->index();
            $table->string('state')->nullable();
            $table->string('company')->nullable()->index();
            $table->string('job_title')->nullable()->index();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_preferred')->default(false);
            $table->boolean('is_main')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
