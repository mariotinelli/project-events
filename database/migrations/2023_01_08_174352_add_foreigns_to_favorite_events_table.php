<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('favorite_events', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_favorite_events_user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('event_id', 'fk_favorite_events_event_id')->references('id')->on('events')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorite_events', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'event_id']);
        });
    }
};
