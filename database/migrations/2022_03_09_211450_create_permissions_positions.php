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
        Schema::create('permissions_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permission_id');
            $table->foreignId('position_id');
            $table->timestamps();

            $table->foreign('permission_id')
                ->references('id')
                ->on('employee_permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('position_id')
                ->references('id')
                ->on('employee_positions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_positions');
    }
};
