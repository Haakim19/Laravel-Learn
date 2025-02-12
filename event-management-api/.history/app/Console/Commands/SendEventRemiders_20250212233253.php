<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEventRemiders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-remiders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send All ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Reminder notification sent!');
    }
}
