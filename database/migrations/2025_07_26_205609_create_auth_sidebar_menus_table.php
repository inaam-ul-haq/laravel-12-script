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
        Schema::create('auth_sidebar_menus', function (Blueprint $table) {
            $table->UUID('id')->primary();

            $table->foreignUuid('parent_id')->nullable()->constrained('auth_sidebar_menus')->nullOnDelete();
            $table->string('name');

            $table->string('icon')->nullable();
            $table->string('route')->nullable();
            $table->string('sort_order')->nullable();
            $table->string('feature_key')->nullable();

            $table->string('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_sidebar_menus');
    }
};
