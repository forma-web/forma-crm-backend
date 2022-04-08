<?php

use App\Enums\SexEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable();
            $table->foreignId('status_id');
            $table->foreignId('source_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->enum('sex', SexEnum::values())->nullable();
            $table->string('company')->nullable();
            $table->text('preferences')->nullable();
            $table->text('wishes')->nullable();
            $table->boolean('is_important')->default(false);
            $table->boolean('is_repeated')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->foreign('manager_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->foreign('status_id')
                ->references('id')
                ->on('lead_statuses')
                ->onUpdate('cascade')
                ->onDelete('no action');

            $table->foreign('source_id')
                ->references('id')
                ->on('lead_sources')
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
        Schema::dropIfExists('leads');
    }
}
