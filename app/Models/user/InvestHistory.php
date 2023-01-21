<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\VirtualMachine;

class InvestHistory extends Model
{
    use HasFactory;

    public function machineDetails(){
        return $this->belongsTo(VirtualMachine::class,'machine_id');
    }
}
