<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared("CREATE UNIQUE INDEX user_email_index on users(email) WHERE deleted_at IS NULL");
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('user_email_index');
        });
    }
};
