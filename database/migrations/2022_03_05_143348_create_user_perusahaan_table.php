<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_perusahaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_perusahaan');
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            // ALTER TABLE user_perusahaan ADD CONSTRAINT 'fk_user_perusahaan_user' FOREIGN KEY ('id_users') REFERENCES 'id' ON 'users';

            $table->foreign('id_perusahaan')
                ->references('id')
                ->on('perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_perusahaan');
    }
}
