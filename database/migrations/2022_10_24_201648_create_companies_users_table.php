<?php

use App\Enums\CompanyUserTypesEnum;
use App\Models\Companies\Company;
use App\Models\Companies\Department;
use App\Models\Companies\Office;
use App\Models\Companies\Position;
use App\Models\User;
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
        Schema::create('companies_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Office::class)->nullable();
            $table->foreignIdFor(Position::class)->nullable();
            $table->foreignIdFor(Department::class)->nullable();
            $table->enum('type', CompanyUserTypesEnum::values());
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
        Schema::dropIfExists('companies_users');
    }
};
