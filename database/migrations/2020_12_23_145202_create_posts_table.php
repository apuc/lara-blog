<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Заголовок');
            $table->string('sub_title')->comment('Подзаголовок');
            $table->string('preview')->comment('Имя изображения');
            $table->text('content')->comment('Содержание');
            $table->integer('views')->comment('Количество просмотров');
            $table->integer('likes')->comment('Количество лайков');
            $table->boolean('publish')->comment('Статус публикации');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
