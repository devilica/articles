<?php

namespace App\Console\Commands;

use App\Jobs\CreateRandomArticleJob;
use Illuminate\Console\Command;

class CreateRandomArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:create-random';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        CreateRandomArticleJob::dispatch();
        $this->info('Random article job dispatched.');
        return 0;
    }
}
