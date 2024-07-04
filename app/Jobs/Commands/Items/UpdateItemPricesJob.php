<?php

namespace App\Jobs\Commands\Items;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use Carbon;

//Application Library
use App\Library\Helpers\ItemHelper;

class UpdateItemPricingJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Timeout in seconds
     * 
     * @var int
     */
    public $timeout = 600;

    /**
     * Retries
     * 
     * @var int
     */
    public $retries = 3;

    /**
     * Create a new job instance
     */
    public function __construct() {
        $this->connection = 'redis';
        $this->onQueue('items');
    }

    /**
     * Execute the job
     * 
     * @return void
     */
    public function handle() {
        //Declare variables
        $itemHelper = new ItemHelper;

        //Get the items from the database
        $items = $itemHelper->GetAllItemIds();

        //Update each individual item by dispatching a job
        foreach($items as $item) {
            UpdateSingleItemPricingJob::dispatch($item)->onQueue('items');
        }
    }

    /**
     * Set the tags for Horizon
     * 
     * @var array
     */
    public function tags() {
        return ['UpdateItemPrices', 'Items'];
    }
}