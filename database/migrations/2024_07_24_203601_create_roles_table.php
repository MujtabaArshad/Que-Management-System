<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('RoleName');
            $table->timestamps();                

        });

           DB::table('roles')->insert([
            [ 'RoleName' => 'SuperAdmin', 'created_at' => now(), 'updated_at' => now()],
            [ 'RoleName' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['RoleName'=>'Branchmanager','created_at'=>now(),'updated_at'=>now()],
      
          [ 'RoleName' => 'User', 'created_at' => now(), 'updated_at' => now()],
           ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
}
