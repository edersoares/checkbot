<?php

namespace App\Console\Commands;

use App\Jobs\CheckIfUrlIsOnlineJob;
use App\Url;
use Illuminate\Console\Command;

class SelectUrlsToCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'select-urls-to-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Select URLs to check if are online';

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
     * @return mixed
     */
    public function handle()
    {
        $urls = Url::query()->whereIn('status', Url::getStatusToCheck())->get();

        $urls->map(function ($url) {
            dispatch(new CheckIfUrlIsOnlineJob($url));
        });

        $this->info("URLs checked: " . $urls->count());
    }
}
