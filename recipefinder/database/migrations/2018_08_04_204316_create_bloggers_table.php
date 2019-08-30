<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloggers', function (Blueprint $table) {
            $table->increments('blogger_id');
            $table->string('blogger_email',50)->unique();
            $table->string('blogger_password',50);
            $table->string('blogger_name',100);
            $table->string('phone_number',20);
            $table->string('usertype',20);
            $table->string('blogger_status',20);
           
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
        Schema::dropIfExists('bloggers');
    }
}
