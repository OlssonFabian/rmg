<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToOrdersTableAndDropOldColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->default(1)->after('article_id');
            $table->dropColumn('name');
            $table->dropColumn('phone_nr');
            $table->dropColumn('address');
            $table->dropColumn('town');
            $table->dropColumn('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->string('name');
            $table->string('phone_nr');
            $table->string('address');
            $table->string('town');
            $table->string('email');
        });
    }
}
