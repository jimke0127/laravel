<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('姓名');

            $table->string('email')->comment('邮箱');

            $table->tinyInteger('age')->comment('年龄');

            $table->string('info', 1000)->comment('个人简介');

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->useCurrent();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('profiles');
    }
};
