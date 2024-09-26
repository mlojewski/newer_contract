<?php

namespace App\Console\Commands;

use App\Models\Ad;
use Illuminate\Console\Command;

class Verify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if any ads are older than 40 days and if so disactivate them';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $compareDate = date('Y-m-d', strtotime('-24 days'));

        $ads = Ad::all();
        foreach ($ads as $ad) {
            if (date('Y-m-d', strtotime($ad->created_at)) < $compareDate) {
                $ad->is_valid = false;
                $ad->save();
            }
        }
        $this->info('Verification done');
        return Command::SUCCESS;
    }
}
