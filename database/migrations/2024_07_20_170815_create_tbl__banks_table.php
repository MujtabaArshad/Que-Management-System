<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBanksTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_banks', function (Blueprint $table) {
            $table->id('BankId');
            $table->string('Bankname')->unique();
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->integer('No_of_Employee');
            $table->string('NTN')->unique();
            $table->text('Address');
            $table->string('Password');
            $table->string('Branches');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_banks');
    }
}
