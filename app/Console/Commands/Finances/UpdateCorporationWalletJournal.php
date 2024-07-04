<?php

namespace App\Console\Commands\Finances;

//Internal Library
use Illuminate\Console\Command;
use Log;
use Carbon\Carbon;

//Application Library
use App\Library\Helpers\FinanceHelper;

//Jobs
use App\Jobs\Commands\Finances\UpdateCorporationWalletJournalJob;

//Models
use App\Models\Finances\CorporationWalletJournal;

class UpdateCorporationWalletJournal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finances:UpdateJournals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update the corporation's finance journal.";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        UpdateAllianceWalletJournalJob::dispatch()->onQueue('finances');
    }
}
