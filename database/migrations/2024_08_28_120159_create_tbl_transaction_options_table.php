<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
            public function up(): void
            {
            Schema::create('tbl_transaction_options', function (Blueprint $table) {
            $table->id('transaction_option_id');
            $table->string('transaction_option_name');
            $table->timestamps();

            
         
        });


        DB::table('tbl_transaction_options')->insert([
                 [ 'transaction_option_name' => 'Cash Deposit', 'created_at' => now(), 'updated_at' => now()],
            [ 'transaction_option_name' => 'Cash Withdrawal', 'created_at' => now(), 'updated_at' => now()],
            [ 'transaction_option_name' => 'Cash Billpayement', 'created_at' => now(), 'updated_at' => now()],
            
        ]);
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaction_options');
    }
};
