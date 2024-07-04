<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

//Jobs
use App\Jobs\Commands\Finances\UpdateAllianceWalletJournalJob;
use App\Jobs\Commands\Finances\UpdateItemPrices as UpdateItemPricesJob;
use App\Jobs\Commands\Data\PurgeUsers as PurgeUsersJob;
use App\Jobs\Commands\Structures\FetchCorporationStructures;
use App\Jobs\Commands\Structures\PurgeCorporationStructures;
use App\Jobs\Commands\Assets\FetchCorporationAssets;
use App\Jobs\Commands\Assets\PurgeCorporationAssets;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by the application
     * 
     * @var array
     */
    protected $commands = [
        Commands\Data\PurgeUsers::class,
        Commands\Finances\UpdateCorporationWalletJournal::class,
        Commands\Structures\ExecuteFetchCorporationStructuresCommand::class,
        Commands\Structures\ExecuteFetchCorporationAssetsCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
