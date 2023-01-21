<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\admin\VirtualMachine;

use Carbon\Carbon;



class VmmCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:vmmCreate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Vmm automatically before destroy';

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
        $data = VirtualMachine::where('status','Active')->get();
        foreach($data as $machine){
        
        $datetime_1 = $machine->start_time; 
        $datetime_2 = date('Y-m-d H:i:s'); 
        $from_time = strtotime($datetime_1); 
        $to_time = strtotime($datetime_2); 
        $diff_minutes = round(abs($from_time - $to_time) / 60,2);
        $minute=round($diff_minutes);
        $life_time=date('i',strtotime($machine->lifetime));
        $execution_time=date('i',strtotime($machine->execution_time));
        $new_data_insert_time=$life_time.':'.$execution_time;
        $current_minute_seconds=date('i:s');
        if($minute==$execution_time && $new_data_insert_time==$current_minute_seconds){
          $neMachine=$machines->replicate();
          $neMachine->start_time=Carbon::now();
          $neMachine->created_at=Carbon::now();
          $neMachine->save();
          $id=$machine->id;
          $machines=VirtualMachine::find($id);
          VirtualMachine::where('id',$id)->update([
            'status'=>'Finished'
          ]);
         }

        }
    }
}
