<?php

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
        Schema::create('schools', function (Blueprint $table) {
            $table->id('schoolID');
            $table->string('Name', 50);
            $table->enum('Country', ['UK', 'USA', 'Canada', 'Australia', 'New Zealand', 'Japan']);
        });
        DB::table('schools')->insert([
            ['schoolID' => 1, 'Name' => 'London School of Economics', 'Country' => 'UK'],
            ['schoolID' => 2, 'Name' => 'University of Oxford', 'Country' => 'UK'],
            ['schoolID' => 3, 'Name' => 'University of Cambridge', 'Country' => 'UK'],
            ['schoolID' => 4, 'Name' => 'Imperial College London', 'Country' => 'UK'],
            ['schoolID' => 5, 'Name' => 'Harvard University', 'Country' => 'USA'],
            ['schoolID' => 6, 'Name' => 'Stanford University', 'Country' => 'USA'],
            ['schoolID' => 7, 'Name' => 'University of Toronto', 'Country' => 'Canada'],
            ['schoolID' => 8, 'Name' => 'University of Melbourne', 'Country' => 'Australia'],
            ['schoolID' => 9, 'Name' => 'University of Auckland', 'Country' => 'New Zealand'],
            ['schoolID' => 10, 'Name' => 'University of Tokyo', 'Country' => 'Japan']
        ]);
        Schema::create('school_profile_mapping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools');
            $table->integer('UserRefID');
        });

        // Insert data
        DB::table('school_profile_mapping')->insert([
            ['school_id' => 1, 'UserRefID' => 100567],
            ['school_id' => 2, 'UserRefID' => 100567],
            ['school_id' => 4, 'UserRefID' => 100567],
            ['school_id' => 2, 'UserRefID' => 200234],
            ['school_id' => 3, 'UserRefID' => 300901],
            ['school_id' => 4, 'UserRefID' => 400678],
            ['school_id' => 1, 'UserRefID' => 500345]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
        Schema::dropIfExists('school_profile_mapping');
    }
};
