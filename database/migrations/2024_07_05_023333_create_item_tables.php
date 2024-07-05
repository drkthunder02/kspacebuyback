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
        if(!Schema::hasTable('item')) {
            Schema::createTable('item', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->double('capacity')->nullable();
                $table->text('description')->nullable();
                $table->double('mass')->nullable();
                $table->string('name')->nullable();
                $table->double('packaged_volume')->nullable();
                $table->double('portion_size')->nullable();
                $table->double('radius')->nullable();
                $table->unsignedBigInteger('type_id');
                $table->double('volume')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_graphic')) {
            Schema::createTable('item_graphic', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->unsignedBigInteger('graphic_id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_group')) {
            Schema::createTable('item_group', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->unsignedBigInteger('group_id')->nullable();
                $table->unsignedBigInteger('market_group_id')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_icon')) {
            Schema::createTable('item_icon', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->unsignedBigInteger('icon_id')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_meta')) {
            Schema::createTable('item_meta', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->unsignedBigInteger('item_meta')->nullable();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_multiplier')) {
            Schema::createTable('item_multiplier', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->decimal('item_multiplier', 5, 2);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_price')) {
            Schema::createTable('item_price', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->decimal('item_price', 20, 2);
                $table->timestamps();
            });
        }

        //Get the contents of the sde files here and load them into the tables
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
        Schema::dropIfExists('item_graphic');
        Schema::dropIfExists('item_group');
        Schema::dropIfExists('item_icon');
        Schema::dropIfExists('item_meta');
        Schema::dropIfExists('item_multiplier');
        Schema::dropIfExists('item_price');
    }
};
