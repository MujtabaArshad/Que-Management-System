<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBranchesTable extends Migration
{

    
    public function up()
    {
        Schema::create('tbl_branches', function (Blueprint $table) {
            $table->id('BranchID');
            $table->string('BranchName');
            $table->string('BranchAddress');
            $table->integer('BranchCode')->unique();
            $table->bigInteger('BankID')->unsigned();
            
            $table->unsignedBigInteger('CityID');
  
            $table->timestamps();
        
            $table->foreign('BankID')
                  ->references('BankId')
                  ->on('tbl_banks')
                  ->onDelete('cascade');
        
            $table->foreign('CityID')
                  ->references('id')
                  ->on('cities')
                  ->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('tbl_branches');
    }
}
