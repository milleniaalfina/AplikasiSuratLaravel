<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mail')->unsigned();
            $table->integer('mail_from')->unsigned();
            $table->integer('mail_to')->unsigned();
            $table->text('description');
            $table->enum('mark', ['read','unread']);
            $table->timestamps();

            $table->foreign('id_mail')->references('id')->on('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mail_from')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('mail_to')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispositions');
    }
}
