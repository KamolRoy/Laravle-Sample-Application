<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class foo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foo {name} {surename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing foo command';

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
        //
        $this->info('Hello Mr ' . $this->argument('name') . ' ' . $this->argument('surename') );

    }
}
