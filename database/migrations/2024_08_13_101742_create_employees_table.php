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

        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('departman_id')->nullable();
                $table->foreign('departman_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
                $table->string("name");
                $table->string("email")->unique();
                $table->string("password");
                $table->string("img")->nullable();
                $table->string("country")->nullable();
                $table->string("mobile")->nullable();
                $table->date('date_of_birth')->nullable();
                $table->enum('gender', ['Male', 'Female'])->nullable();
                $table->date('joining_date')->nullable();
                $table->enum('martial_status', ['Married', 'Unmarried', 'Divorced'])->nullable();
                $table->text('about')->nullable();
                $table->text('address')->nullable();
                $table->enum('status', ['Active', 'Deactive'])->nullable()->default('Active');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
