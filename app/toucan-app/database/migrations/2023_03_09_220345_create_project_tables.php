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
        // Create the profiles table
        Schema::create('profiles', function (Blueprint $table) {
            $table->id('UserRefID');
            $table->string('Firstname', 50);
            $table->string('Surname', 50);
            $table->boolean('Deceased');
            $table->timestamps();
        });
        // Insert test data into the profiles table
        DB::table('profiles')->insert([
            ['UserRefID' => 100567, 'Firstname' => 'John', 'Surname' => 'Smith', 'Deceased' => false],
            ['UserRefID' => 200234, 'Firstname' => 'Sarah', 'Surname' => 'Johnson', 'Deceased' => true],
            ['UserRefID' => 300901, 'Firstname' => 'Michael', 'Surname' => 'Williams', 'Deceased' => false],
            ['UserRefID' => 400678, 'Firstname' => 'Emily', 'Surname' => 'Davis', 'Deceased' => false],
            ['UserRefID' => 500345, 'Firstname' => 'David', 'Surname' => 'Wilson', 'Deceased' => true],
        ]);
        // Create the emails table
        Schema::create('emails', function (Blueprint $table) {
            $table->id('emailID');
            $table->unsignedBigInteger('UserRefID');
            $table->string('emailaddress', 100);
            $table->boolean('Default');
            $table->timestamps();
        });
        // Insert test data into the emails table, including duplicate email addresses
        DB::table('emails')->insert([
            ['emailID' => 567, 'UserRefID' => 100567, 'emailaddress' => 'j.smith@zmail.com', 'Default' => true],
            ['emailID' => 568, 'UserRefID' => 100567, 'emailaddress' => 'john.smith@example.com', 'Default' => false],
            ['emailID' => 569, 'UserRefID' => 300901, 'emailaddress' => 'michael.williams@example.com', 'Default' => true],
            ['emailID' => 570, 'UserRefID' => 400678, 'emailaddress' => 'emily.davis@example.com', 'Default' => true],
            ['emailID' => 571, 'UserRefID' => 200234, 'emailaddress' => 'sarah.johnson@example.com', 'Default' => true],
            ['emailID' => 572, 'UserRefID' => 500345, 'emailaddress' => 'david.wilson@example.com', 'Default' => false],
            ['emailID' => 573, 'UserRefID' => 100567, 'emailaddress' => 'j.smith@zmail.com', 'Default' => false],
            ['emailID' => 574, 'UserRefID' => 400678, 'emailaddress' => 'emily.davis@example.com', 'Default' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('emails');
    }
};
