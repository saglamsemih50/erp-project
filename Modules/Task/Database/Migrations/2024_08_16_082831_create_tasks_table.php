<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')->references('id')->on("companies")->onDelete("cascade")->onUpdate("cascade");
                $table->string('title');
                $table->longText('description')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->unsignedBigInteger('task_category_id')->nullable();
                $table->foreign('task_category_id')->references('id')->on('task_categories')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('department_id')->nullable();
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
                $table->enum('status', ['incomplete', 'completed'])->default('incomplete');
                $table->dateTime('completed_on')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
