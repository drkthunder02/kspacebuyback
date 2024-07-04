<?php

namespace App\Console\Commands\Structures;

use Illuminate\Console\Command;

use App\Jobs\Commands\Assets\FetchCorporationAssets as FCA;

class ExecuteFetchCorporationAssetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'structure:assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute fetch corporation assets command.';

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
        FCA::dispatch();

        return 0;
    }
}
