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
        Schema::create('tbl_transaction_option_details', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('customer_phone');
        $table->unsignedBigInteger('transaction_option_id_FK');
               
            
              $table->string('transaction_name');
            $table->Integer('ticket_number');
            
          
            $table->foreign('transaction_option_id_FK')
            ->references('transaction_option_id')
            ->on('tbl_transaction_options')
            ->onDelete('cascade');

            $table->timestamps();
            // $table->foreign('branch_id')
            // ->references('BranchID')
            // ->on('tbl_branches')
            // ->onDelete('cascade');

          
           

            // $table->foreign('branch_id')
            // ->references('BranchID')
            // ->on('tbl_branches');
                
            //  $table->foreign('branch_code')->references('BranchID')->on('tbl_branches');
            


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaction_option_details');
    }
};