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
    //     Schema::table('tbl_transaction_option_details', function (Blueprint $table) {
    //  $table->unsignedBigInteger('BranchID')->after('transaction_option_id_FK');
    // $table->foreign('BranchID')->references('BranchID')->on('tbl_branches');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_transaction_option_details', function (Blueprint $table) {
            //
        });
    }
};
