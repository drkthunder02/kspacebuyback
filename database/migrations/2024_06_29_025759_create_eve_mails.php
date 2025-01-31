<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if(!Schema::hasTable('eve_mails')) {
            Schema::create('eve_mails', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sender');
                $table->string('recipient');
                $table->string('recipient_type');
                $table->text('subject');
                $table->text('body');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('sent_mails')) {
            Schema::create('sent_mails', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sender');
                $table->string('subject');
                $table->text('body');
                $table->string('recipient');
                $table->string('recipient_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eve_mails');
        Schema::dropIfExists('sent_mails');
    }
};
