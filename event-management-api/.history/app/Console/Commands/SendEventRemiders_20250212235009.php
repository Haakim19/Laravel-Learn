<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
    protected $description = 'Send notification to all event attendees that even starts soon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = \App\Models\Event::with('attendees.user')
            ->whereBetween('start_time', [now(), now()->addDay()])
            ->get();

        $eventCount = $events->count();
        $eventLable = Str::plural('event', $eventCount);

        $this->info("Found {$eventCount} {$eventLable}.");
        $events->each(
            fn($event)=>$event->attendees->each(
                fn($attendee)=>$this->info("Notifying the user {$attendee->user->id}")
            )
        );
        $this->info('Reminder notification sent!');
    }
}
