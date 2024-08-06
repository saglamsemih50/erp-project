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
         if (!Schema::hasTable('qr_code')) {
            Schema::create('qr_code', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign("company_id")->references('id')->on("companies")->onDelete('cascade')->onUpdate('cascade');
                $table->string('title')->nullable();
                $table->longText("data");
                $table->string("type")->default("text");
                $table->string("size")->default(200);
                $table->string("margin")->default(0);
                $table->string("foreground_color")->default('#000000');
                $table->string("background_color")->default("#ffffff");
                $table->string("form_data")->nullable();
                $table->timestamps();
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code');
    }
};
