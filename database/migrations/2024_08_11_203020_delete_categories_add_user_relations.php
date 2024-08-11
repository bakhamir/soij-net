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
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('categoriesId'); // Удалить столбец
            $table->integer('user_id')->default(0); // Добавить новый столбец
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->integer('categoriesId'); // Удалить столбец
            $table->dropColumn('user_id')->default(0); // Добавить новый столбец
        });
    }
};
