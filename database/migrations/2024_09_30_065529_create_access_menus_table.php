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
        Schema::create('access_menus', function (Blueprint $table) {
            $table->id();   
            
                  $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('main_menu')->onDelete('cascade');
            
          
            $table->unsignedBigInteger('submenu_id');
            $table->foreign('submenu_id')->references('id')->on('sub_menu')->onDelete('cascade');

          
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('role_id')->on('access_roles')->onDelete('cascade');

            $table->boolean("Status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_menus');
    }
};
