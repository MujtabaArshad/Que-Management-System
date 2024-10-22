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
        Schema::create('tbl_branchmanagers', function (Blueprint $table) {
            $table->id('ManagerId');
            $table->string('Firstname' );
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('ContactNumber')->unique();
            $table->string('Address');
            $table->string('Age');
            $table->string('NTN')->unique();
            $table->string('Gender');
            $table->bigInteger('BankID')->unsigned();
            $table->bigInteger('BranchID');
            $table->integer('BranchCode');
            $table->bigInteger('CityID')->unsigned();
            $table->date('HireDate');
            $table->date('Date_of_birth');
            $table->double('Salary');
            $table->integer('Role');
            $table->integer('Status')->default(1);  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_branchmanagers');   
    }
};
