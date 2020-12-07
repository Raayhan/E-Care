<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('branch_id',100);
            $table->string('zone',100);
            $table->string('email')->unique();
            $table->string('phone',100);
            $table->string('password',255);
            $table->integer('completed')->nullable()->default('0');
            $table->integer('pending')->nullable()->default('0');
            $table->decimal('balance')->nullable()->default('0.00');
            $table->rememberToken();
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
        Schema::dropIfExists('branches');
    }
}
