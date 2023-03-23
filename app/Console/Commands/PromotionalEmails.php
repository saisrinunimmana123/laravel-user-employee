<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class PromotionalEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promotional:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'promotional description';

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
        //  $message = [
        //     'message' => 'Hello, did you know that moving services to the Edge is complicated but Section makes it easy. ',
        // ];

        // $key = array_rand($message);
        // $value = $message[$key];
        // DB::table('users')->whereIn('id', [6,7])->delete();
        DB::table('employeedata')->whereIn('id', [44,45])->delete();

        \Log::info('delete user has been  successfully!');
         return 'delete user has been  successfully';
       
   

        // $this->info($value);
          // \Log::info("test");
         // Auth::login(User::where('role',true)->first());

    }
}
