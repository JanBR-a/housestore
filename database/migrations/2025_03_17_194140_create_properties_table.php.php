<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->string('address');
            $table->string('image');
            $table->enum('type', ['casa', 'chalet', 'apartamento', 'solar']);
            $table->boolean('garden')->default(false);
            $table->enum('state', ['compra','alquiler']);
            $table->integer('bedrooms')->default(1);
            $table->integer('bathrooms')->default(1);
            $table->integer('m2');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            // id,title,description,price,addres,image,type(casa, etc),bedrooms,bathrooms,m2,agente--id,
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
