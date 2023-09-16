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
        Schema::create('trash_types', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->string("desc");
            $table->integer("category_id")->references("category_id")->on('categories');
            $table->string("picture");
            $table->string("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_types');
    }
};
