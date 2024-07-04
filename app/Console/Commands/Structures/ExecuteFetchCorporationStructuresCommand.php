<?php

namespace App\Console\Commands\Structures;

use Illuminate\Console\Command;

use App\Jobs\Commands\Structures\FetchCorporationStructures as FCS;

class ExecuteFetchCorporationStructuresCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'structure:structure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch corporation structures command.';

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
        FCS::dispatch();

        return 0;
    }
}
