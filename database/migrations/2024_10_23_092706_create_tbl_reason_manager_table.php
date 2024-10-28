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
        Schema::create('tbl_reason_manager', function (Blueprint $table) {
            $table->id();

            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contactnumber')->unique();
            $table->string('address');
            $table->integer('age');
            $table->string('ntn')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('bankid');
             $table->unsignedBigInteger('branchid');
            $table->unsignedBigInteger('cityid');
            $table->date('hiredate');
            $table->date('dateofbirth');
            $table->double('salary');
            $table->integer('role');
         
        
            $table->timestamps();
            
            

           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reason_manager');
    }
};
