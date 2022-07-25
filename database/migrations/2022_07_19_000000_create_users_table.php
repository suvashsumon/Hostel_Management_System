<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone_no')->unique();
            $table->string('email', 255)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_pic')->default('default_user.png');
            $table->foreignId('mess_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('role', ['admin', 'mess_owner', 'mess_manager', 'mess_boarder', 'new_user'])->default('new_user');
            $table->date('last_subscribed')->nullable();
            $table->date('active_till')->nullable();
            $table->enum('status', ['active', 'inactive', 'expired'])->default('inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
