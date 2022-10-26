<?php

use App\Models\Companies\Permission;
use App\Models\Companies\Position;
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
        Schema::create('permission_position', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Permission::class);
            $table->foreignIdFor(Position::class);
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
        Schema::dropIfExists('permission_position');
    }
};
