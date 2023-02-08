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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128)->default('Unnamed')->nullable();
            $table->string('email', 64)->unique();
            $table->unsignedInteger('mobile')->unique();
            $table->string('activation_code', 32)->nullable()->comment('code xác thực');
            $table->tinyInteger('is_verified_mobile')->nullable()->comment('0: Not, 1: Verified');
            $table->tinyInteger('is_verified_email')->nullable()->comment('0: Not, 1: Verified');
            $table->string('authen_method', 12)->nullable()->comment('Đăng ký bằng phương thức nào');
            $table->string('invitation_code', 4)->nullable()->comment('Mã giới thiệu của user');
            $table->string('invitation_by_code', 4)->nullable()->comment('Được giới thiệu bởi invitation_code của ai?');
            $table->unsignedInteger('actived_at')->nullable()->defaul(null);
            $table->unsignedInteger('blocked_at')->nullable()->defaul(null);
            $table->unsignedInteger('deleted_at')->nullable()->defaul(null);
            $table->string('password')->nullable();
            $table->integer('state')->default(0)->comment('0: UnActive, 1 : Actived, 2 : Blocked');
            $table->integer('level_accout')->default(0)->comment('Tài khoản thuộc level mấy ?');
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
};
