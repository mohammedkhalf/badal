<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNationalToReaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('re_accounts', function (Blueprint $table) {
            $table->string('national_id')->nullable()->after('id');
            $table->integer('national_image_front')->after('id')->unsigned()->references('id')->on('media_files')->index()->nullable();
            $table->integer('national_image_back')->after('id')->unsigned()->references('id')->on('media_files')->index()->nullable();
           
            $table->integer('personal_img')->after('id')->unsigned()->references('id')->on('media_files')->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('re_accounts', function (Blueprint $table) {
            $table->dropColumn('national_id');
        });
    }
}
