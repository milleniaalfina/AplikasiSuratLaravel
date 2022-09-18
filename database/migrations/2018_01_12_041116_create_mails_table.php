<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mail_code');
            $table->integer('mail_from')->unsigned();
            $table->integer('mail_to')->unsigned();
            $table->string('mail_subject');
            $table->text('description');
            $table->string('file_name');
            $table->integer('id_type')->unsigned();
            $table->enum('mark', ['read','unread']);
            $table->timestamps();

            $table->foreign('id_type')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('mails');
    }
}
