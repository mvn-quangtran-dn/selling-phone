<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('screen');//màn hình
            $table->string('system');//Hệ điều hành
            $table->string('fcamera');//Camera trước
            $table->string('bcamera');//Camera sau
            $table->string('cpu');
            $table->string('ram');
            $table->string('rom');//Bộ nhớ trong
            $table->string('smenory');//thẻ nhớ ngoài
            $table->string('pin');
            $table->text('description');//Mô tả
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
