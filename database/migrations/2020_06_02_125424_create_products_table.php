<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();            
            $table->decimal('price', 8, 2);
            $table->enum('size', ['46', '48', '50', '52']);
            $table->mediumText('url_image')->nullable();
            $table->enum('code', ['new', 'solde']);
            $table->string('reference', 100);
            $table->enum('status', ['published', 'unpublished', 'draft'])->default('unpublished');
            $table->enum('genre', ['homme', 'femme'])->nullable();
            $table->foreignId('category_id')
                ->nullable() 
                ->constrained() 
                ->onDelete('SET NULL'); 
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
        Schema::dropIfExists('products');
    }
}
