<?php

use App\Enums\SexEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id');
            $table->foreignId('department_id');
            $table->foreignId('office_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->date('birth_date');
            $table->date('hire_date');
            $table->string('phone');
            $table->string('email');
            $table->enum('sex', SexEnum::values());
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->foreign('position_id')
                ->references('id')
                ->on('employee_positions')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->foreign('department_id')
                ->references('id')
                ->on('employee_departments')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->foreign('office_id')
                ->references('id')
                ->on('employee_offices')
                ->onUpdate('cascade')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
