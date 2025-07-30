<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_sidebar_menu_permissions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('auth_sidebar_menu_id');
            $table->unsignedBigInteger('permission_id');

            $table->timestamps();

            $table->foreign('auth_sidebar_menu_id')->references('id')->on('auth_sidebar_menus')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->unique(
                ['auth_sidebar_menu_id', 'permission_id'],
                'menu_permission_unique' // custom index name to avoid MySQL limit
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_sidebar_menu_permissions');
    }
};
