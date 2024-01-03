<?php
// database/migrations/2022_01_01_000000_add_link_to_chatbots_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToChatbotsTable extends Migration
{
    public function up()
    {
        Schema::table('chatbots', function (Blueprint $table) {
            $table->string('link')->after('description')->nullable(); // Adjust data type and position as needed
            $table->string('image')->after('link')->nullable();
        });
    }

    public function down()
    {
        Schema::table('chatbots', function (Blueprint $table) {
            $table->dropColumn('link', 'image');
        });
    }
}
