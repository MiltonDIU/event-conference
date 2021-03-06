<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('user_id', 'user_id_fk_383842')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('role_id', 'role_id_fk_383842')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
