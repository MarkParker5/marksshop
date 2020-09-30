<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryOrder extends Migration{

    public function up(){
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', array('waiting','delivery')); 
            $table->string('name');
            $table->string('surname');
            $table->string('tel');
            $table->string('mail')->nullable();
            $table->string('city');
            $table->string('post');
            $table->text('comment')->nullable();
       });
    }

    public function down(){
        Schema::table('order', function (Blueprint $table) {
            //
        });
    }
}
