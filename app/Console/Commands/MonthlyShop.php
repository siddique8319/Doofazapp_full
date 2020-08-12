<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\NewShopEntry;
class MonthlyShop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:shop';

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
     * @return mixed
     */
    public function handle()
    {
        $update=NewShopEntry::whereDate('created_at','<', Carbon::now()->subDays(30))->update([         
            'status' =>2,
         ]);
    }
}
