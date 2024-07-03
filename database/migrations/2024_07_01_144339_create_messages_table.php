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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user');
            $table->integer('to_user');
            $table->string('content');
            $table->dateTime('chat_id');
            $table->timestamps();
        });
     }
        
        // 'from_user' => auth("sanctum")->user()->id,
        //     'to_user'   => $OtherUserId,
        //     'content'   => $request->message ,
        //     'chat_id'   => $collection == false? $chat->id:$collection[0]->chat_id,

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
