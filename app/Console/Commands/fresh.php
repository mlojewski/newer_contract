<?php

namespace App\Console\Commands;


use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Fresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migration refresh and database seed';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        (new UserController)->createAdmin();
        (new UserController)->createOrganization();
        (new UserController)->createPerson();
        (new AdController)->matchAuthor();
        $this->info('DB refreshed and reseeded');
        return Command::SUCCESS;
    }
}
