<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Category::class);
            $table->string('title');
            $table->enum('status', ['LEASE', 'OWNER'])->default('LEASE');
            $table->enum('listed_in', ['Hot', 'Super Hot', 'Normal'])->default('Hot');
            $table->unsignedBigInteger('price');
            $table->string('country');
            $table->enum('state', ['Punjab', 'Sindh', 'Khyber Pakhtunkhwa', 'Balochistan'])->default('Punjab');
            $table->string('city');
            $table->string('apartment')->nullable();
            $table->string('address');

            $table->string('image')->nullable();
            $table->text('description');
            $table->integer('size_square_meter');
            $table->integer('lot_size');
            $table->integer('rooms')->nullable();
            $table->string('kitchen')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->string('build_date');

            $table->enum('garages',['Not', 'One', 'Two', 'Three'])->default('Not');
            $table->enum('garage_size',['Not', 'One Car', 'Two Car', 'Three Car'])->default('Not');
            $table->string('available_date');

            $table->string('basement')->nullable();
            $table->string('roofing')->nullable();
            $table->string('external_construction')->nullable();

            $table->boolean('balcony')->default(0);
            $table->boolean('garden')->default(0);
            $table->boolean('chair_accessible')->default(0);
            $table->boolean('doorman')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('front_yard')->default(0);

            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
