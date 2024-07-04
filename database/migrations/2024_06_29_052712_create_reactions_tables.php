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
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivity.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivityMaterials.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivityProbabilities.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivityProducts.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivityRaces.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryActivitySkills.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/industry/industryBlueprints.sql'));

        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invCategories.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invContrabandTypes.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invControlTowerResourcePurposes.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invControlTowerResources.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invFlags.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invGroups.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invItems.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invMarketGroups.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invMetaGroups.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invNames.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invtraits.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invTypeReactions.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invUniqueNames.sql'));
        DB::unprepared(file_get_contents('database/seeders/sql_files/inv/invVolumes.sql'));

        if(!Schema::hasTable('reaction_lookup')) {
            Schema::create('reaction_lookup', function(Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('reaction_id');
                $table->string('reaction_recipe_name');
                $table->unsignedBigInteger('fuel_block_id');
                $table->string('fuel_block_name');
            });
        }

        if(!Schema::hasTable('reaction_input_lookup')) {
            Schema::create('reaction_input_lookup', function(Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('reaction_id');
                $table->unsignedBigInteger('input_id');
                $table->string('input_name');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industryActivity');
        Schema::dropIfExists('industryActivityMaterials');
        Schema::dropIFExists('industryActivityProbabilities');
        Schema::dropIfExists('industryActivityProducts');
        Schema::dropIfExists('industryActivityRaces');
        Schema::dropIfExists('industryActivitySkills');
        Schema::dropIfExists('industryBlueprints');

        Schema::dropIfExists('invCategories');
        Schema::dropIfExists('invContrabandTypes');
        Schema::dropIfExists('invControlTowerResourcesPurposes');
        Schema::dropIfExists('invcontrolTowerResources');
        Schema::dropIfExists('invFlags');
        Schema::dropIfExists('invGroups');
        Schema::dropIfExists('invItems');
        Schema::dropIfExists('invMarketGroups');
        Schema::dropIfExists('invMetaGroups');
        Schema::dropIfExists('invNames');
        Schema::dropIfExists('invTraits');
        Schema::dropIfExists('invTypeReactions');
        Schema::dropIfExists('invUniqueNames');
        Schema::dropIfExists('invVolumes');

        Schema::dropIfExists('reaction_lookup');
        Schema::dropIfExists('reaction_input_lookup');
    }
};
