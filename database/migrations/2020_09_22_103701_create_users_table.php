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
            $table->string('code',50);
            $table->string('name',160);
            $table->string('username',50);
            $table->string('address');
            $table->string('phone',50);
            $table->string('email',50)->unique();
            $table->enum('is_active',['active','inactive']);
            $table->date('join_date');
            $table->date('expired_date');
            $table->string('password',191);
            $table->rememberToken();
            // $table->timestamp('email_verified_at')->nullable();
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
