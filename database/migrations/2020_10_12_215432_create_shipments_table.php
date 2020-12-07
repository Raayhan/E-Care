<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parcel_id');
            $table->string('sender_name');
            $table->text('sender_phone');
            $table->text('sender_address');
            $table->string('recipient_name');
            $table->text('recipient_phone');
            $table->text('recipient_address');
            $table->text('zone');
            $table->text('branch')->nullable();;
            $table->string('details');
            $table->string('notes')->nullable();
            $table->string('type');
            $table->string('delivery');
            $table->string('status');
            $table->decimal('amount');
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
        Schema::dropIfExists('shipments');
    }
}
