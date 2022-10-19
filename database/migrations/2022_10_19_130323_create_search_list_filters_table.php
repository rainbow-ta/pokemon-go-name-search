<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_list_filters', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_exclusion');
            $table->boolean('is_or_search');
            $table->string('memo');
            $table->unsignedBigInteger('search_list_id')->nullable();
            $table->unsignedBigInteger('filter_id')->nullable();
            $table->foreign('search_list_id')->references('id')->on('search_lists')->onDelete('cascade');
            $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
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
        Schema::dropIfExists('search_list_filters');
    }
};
