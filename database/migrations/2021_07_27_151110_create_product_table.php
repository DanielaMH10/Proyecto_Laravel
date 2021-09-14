<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();//crea un campo autoincremnetable cmo entero sin signo, con el nombre id
            $table->string('name',50);
            $table->double('cost',10,2);//el primer campo es para indicar cuanto caracteres lleva la parte entera y el otro la parte decimal
            $table->double('price',10,2);
            $table->integer('quantity');
            $table->foreignId('brand_id');
            $table->foreignId('category_id');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
