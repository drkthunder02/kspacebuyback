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
        if(!Schema::hasTable('buyback_station')) {
            Schema::create('buyback_station', function(Blueprint $table) {
                $table->unsignedBigInteger('contract_id')->primary();
                $table->unsignedBigInteger('station_id')->nullable();
                $table->string('station_name')->nullable();
                $table->enum('station_allowed_dock', [
                    'yes',
                    'no',
                ])->default('no');
            });
        }

        if(!Schema::hasTable('buyback_contract')) {
            Schema::create('buyback_contract', function(Blueprint $table) {
                $table->unsignedBigInteger('contract_id')->unique();
                $table->string('contract_name');
                $table->enum('contract_state', [
                    'quote',
                    'accepted',
                    'rejected',
                ]);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('buyback_contract_items')) {
            Schema::create('buyback_contract_items', function(Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('contract_id');
                $table->unsignedBigInteger('item_id');
                $table->string('item_name');
                $table->decimal('item_quantity');
                $table->double('item_price', 20, 2);
                $table->decimal('item_multiplier', 5, 2);
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('eve_contract')) {
            Schema::create('eve_contract', function(Blueprint $table) {
                $table->unsignedBigInteger('contract_id')->unique();
                $table->unsignedBigInteger('acceptor_id');
                $table->unsignedBigInteger('assignee_id');
                $table->enum('availability', [
                    'public',
                    'personal',
                    'corporation',
                    'alliance',
                ]);
                $table->double('buyout', 20, 2);
                $table->double('collateral', 20, 2);
                $table->dateTime('date_accepted');
                $table->dateTime('date_completed');
                $table->dateTime('date_expired');
                $table->dateTime('date_issued');
                $table->unsignedBigInteger('days_to_complete');
                $table->unsignedBigInteger('end_location_id');
                $table->enum('for_corporation', [
                    'true',
                    'false',
                ]);
                $table->unsignedBigInteger('issuer_corporation_id');
                $table->double('price', 20, 2);
                $table->double('reward', 20, 2);
                $table->unsignedBigInteger('start_location_id');
                $table->enum('status', [
                    'outstanding',
                    'in_progress',
                    'finished_issuer',
                    'finished_contractor',
                    'finished',
                    'cancelled',
                    'rejected',
                    'failed',
                    'deleted',
                    'reversed',
                ]);
                $table->string('title');
                $table->enum('type', [
                    'unknown',
                    'item_exchanged',
                    'auction',
                    'courier',
                    'loan',
                ]);
                $table->unsignedBigInteger('volume');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('eve_contract_item')) {
            Schema::create('contract_item', function(Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('contract_id');
                $table->boolean('is_included');
                $table->boolean('is_singleton');
                $table->unsignedBigInteger('quantity');
                $table->bigInteger('raw_quantity');
                $table->unsignedBigInteger('record_id');
                $table->unsignedBigInteger('type_id');
            });
        }

        if(!Schema::hasTable('buyback_payout')) {
            Schema::create('buyback_payout', function(Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('contract_id')->primary();
                $table->unsignedBigInteger('payee_id');
                $table->string('payee_name');
                $table->string('payer_id');
                $table->unsignedBigInteger('payer_name');
                $table->double('payment_amount', 20, 2);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyback_contract');
        Schema::dropIfExists('buyback_contract_items');
        Schema::dropIfExists('eve_contract');
        Schema::dropIfExists('eve_contract_items');
        Schema::dropIfExists('buyback_payout');
    }
};
