<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class testcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //params 
    //if you wont multipale parms define params as ->parth.*
    //if you wont optional parms define params as ->parth?

    //--oprater  is a option 
    //var1 is a arguments
    protected $signature = 'command:testcommand
    {var1 : arrgument value}
    {--o|--oprater== : give me oparands of the calculation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'my owen commands';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $var =  $this->argument('var1');
       $var2 =$this->option('oprater');

        if($var2){
           $this->info($var2);
        }else if($var) {
            $this->info($var);
        }else{
            $this->error("notting");
        }
        // return Command::SUCCESS;
    }
}
