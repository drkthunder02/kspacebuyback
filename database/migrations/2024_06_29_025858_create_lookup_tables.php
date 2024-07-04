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
        if(!Schema::hasTable('character_lookup')) {
            Schema::create('character_lookup', function (Blueprint $table) {
                $table->unsignedInteger('character_id');
                $table->unsignedInteger('alliance_id')->nullable();
                $table->unsignedInteger('ancestry_id')->nullable();
                $table->string('birthday');
                $table->unsignedInteger('bloodline_id');
                $table->unsignedInteger('corporation_id');
                $table->string('description')->nullable();
                $table->unsignedInteger('faction_id')->nullable();
                $table->string('gender');
                $table->string('name');
                $table->unsignedInteger('race_id');
                $table->float('security_status');
                $table->string('title')->nullable();
            });
        }

        if(!Schema::hasTable('corporation_lookup')) {
            Schema::create('corporation_lookup', function (Blueprint $table) {
                $table->unsignedInteger('corporation_id');
                $table->unsignedInteger('alliance_id')->nullable();
                $table->unsignedInteger('ceo_id');
                $table->unsignedInteger('creator_id');
                $table->string('date_founded')->nullable();
                $table->string('description')->nullable();
                $table->unsignedInteger('faction_id')->nullable();
                $table->unsignedInteger('home_station_id')->nullable();
                $table->unsignedInteger('member_count');
                $table->string('name');
                $table->unsignedInteger('shares')->nullable();
                $table->decimal('tax_rate', 20, 2);
                $table->string('ticker');
                $table->string('url')->nullable();
                $table->enum('war_eligible', [
                    'Yes',
                    'No',
                ])->default('No');
            });
        }

        if(!Schema::hasTable('alliance_lookup')) {
            Schema::create('alliance_lookup', function (Blueprint $table) {
                $table->unsignedInteger('alliance_id');
                $table->unsignedInteger('creator_corporation_id');
                $table->unsignedInteger('creator_id');
                $table->dateTime('date_founded');
                $table->unsignedInteger('executor_corporation_id')->nullable();
                $table->unsignedInteger('faction_id')->nullable();
                $table->string('name');
                $table->string('ticker');
            });
        }

        if(!Schema::hasTable('item_lookup')) {
            Schema::create('item_lookup', function (Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->double('capacity', 20, 2)->nullable();
                $table->text('description');
                $table->unsignedBigInteger('graphic_id')->nullable();
                $table->unsignedBigInteger('group_id');
                $table->unsignedBigInteger('icon_id')->nullable();
                $table->unsignedBigInteger('market_group_id')->nullable();
                $table->string('mass')->nullable();
                $table->string('name');
                $table->double('packaged_volume', 20, 2)->nullable();
                $table->unsignedBigInteger('portion_size')->nullable();
                $table->boolean('published');
                $table->double('radius', 20, 2)->nullable();
                $table->unsignedBigInteger('type_id')->unique();
                $table->double('volume', 20, 2)->nullable();
            });
        }

        if(!Schema::hasTable('item_price_lookup')) {
            Schema::create('item_price_lookup', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->double('item_price', 20, 2);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_group_lookup')) {
            Schema::create('item_group_lookup', function(Blueprint $table) {
                $table->unsignedBigInteger('item_id')->primary();
                $table->unsignedBigInteger('group_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_lookup');
        Schema::dropIfExists('corporation_lookup');
        Schema::dropIfExists('alliance_lookup');
        Schema::dropIfExists('item_lookup');
        Schema::dropIfExists('item_price_lookup');
        Schema::dropIfExists('item_group_lookup');
    }
};
