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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('姓名');

            $table->string('desc')->comment('简介');

            $table->string('long_desc', 1000)->comment('长简介');

            $table->boolean('completed')->comment('是否完成');

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
        Schema::dropIfExists('tasks');
    }
};
