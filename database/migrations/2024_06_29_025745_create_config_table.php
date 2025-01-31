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
        if(!Schema::hasTable('Config')) {
            Schema::create('Config', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->decimal('value');
            });

            DB::table('Config')->insert([
                'name' => 'Refine Rate',
                'value' => 85.0
            ]);

            DB::table('Config')->insert([
                'name' => 'Buyback Tax',
                'value' => 5.0
            ]);
        }

        if(!Schema::hasTable('ItemComposition')) {
            Schema::create('ItemComposition', function (Blueprint $table) {
                $table->string('Name')->unique();
                $table->integer('ItemId');
                $table->decimal('m3Size', 10, 2)->default(0.00);
                $table->integer('BatchSize')->default(100);
                $table->integer('Tritanium')->default(0);
                $table->integer('Pyerite')->default(0);
                $table->integer('Mexallon')->default(0);
                $table->integer('Isogen')->default(0);
                $table->integer('Nocxium')->default(0);
                $table->integer('Zydrine')->default(0);
                $table->integer('Megacyte')->default(0);
                $table->integer('Morphite')->default(0);
                $table->integer('HeavyWater')->default(0);
                $table->integer('LiquidOzone')->default(0);
                $table->integer('NitrogenIsotopes')->default(0);
                $table->integer('HeliumIsotopes')->default(0);
                $table->integer('HydrogenIsotopes')->default(0);
                $table->integer('OxygenIsotopes')->default(0);
                $table->integer('StrontiumClathrates')->default(0);
                $table->integer('AtmosphericGases')->default(0);
                $table->integer('EvaporiteDeposits')->default(0);
                $table->integer('Hydrocarbons')->default(0);
                $table->integer('Silicates')->default(0);
                $table->integer('Cobalt')->default(0);
                $table->integer('Scandium')->default(0);
                $table->integer('Titanium')->default(0);
                $table->integer('Tungsten')->default(0);
                $table->integer('Cadmium')->default(0);
                $table->integer('Platinum')->default(0);
                $table->integer('Vanadium')->default(0);
                $table->integer('Chromium')->default(0);
                $table->integer('Technetium')->default(0);
                $table->integer('Hafnium')->default(0);
                $table->integer('Caesium')->default(0);
                $table->integer('Mercury')->default(0);
                $table->integer('Dysprosium')->default(0);
                $table->integer('Neodymium')->default(0);
                $table->integer('Promethium')->default(0);
                $table->integer('Thulium')->default(0);
            });
        }

        if(!Schema::hasTable('mineral_prices')) {
            Schema::create('mineral_prices', function (Blueprint $table) {
                $table->increments('id');
                $table->string('Name');
                $table->integer('ItemId');
                $table->decimal('Price', 20, 2);
                $table->dateTime('Time');
            });
        }

        if(!Schema::hasTable('ore_prices')) {
            Schema::create('ore_prices', function (Blueprint $table) {
                $table->increments('id');
                $table->string('Name');
                $table->integer('ItemId');
                $table->decimal('BatchPrice', 20,2);
                $table->decimal('UnitPrice', 20, 2);
                $table->decimal('m3Price', 20, 2);
                $table->string('Time');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Config');
        Schema::dropIfExists('ItemComposition');
        Schema::dropIfExists('mineral_prices');
        Schema::dropIfExists('ore_prices');
    }
};
