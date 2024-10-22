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
        Schema::create('user_banks', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName') ;
            $table->string('LastName') ;
            $table->string('Email')->unique();
            $table->string('ContactNumber')->unique();
        
            $table->string('Address');
            $table->integer('Age');
            $table->bigInteger('NTN')->unique();
            $table->string('Password');
            $table->string('Gender');
            $table->unsignedBigInteger('RoleID');
             // or
            $table->integer('Status')->default(1);  
                 // $table->foreign('RoleID')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
            
            


            

        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_banks', function (Blueprint $table) {
            $table->boolean('active')->default(true);

        });

        Schema::dropIfExists('user_banks');
    }
};
