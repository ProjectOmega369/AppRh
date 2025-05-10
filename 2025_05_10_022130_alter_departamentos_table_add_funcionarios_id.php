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
        Schema::create("departamentos", function (Blueprint $table) {
            $table->unsignedBigInteger("funcionario_id")->nullable();
            $table->foreign("funcionario_id")->references("id")->on("funcionarios");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
