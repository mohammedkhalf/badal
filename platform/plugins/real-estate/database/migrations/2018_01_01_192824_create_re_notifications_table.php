<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_notifications', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->unsignedBigInteger('reciever_id');
            $table->unsignedBigInteger('property_id')->nullable();
            $table->text('url')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('re_notifications');
    }
}
