<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user\InvestHistory;
use App\Models\User;

class VirtualMachine extends Model
{
    use HasFactory;

    public function myInvest($id){
      return InvestHistory::where('user_id',auth()->user()->id)->where('machine_id',$id)->sum('invest_amount');
    }

    public function userInvest(){
      return $this->hasMany(InvestHistory::class,'machine_id');
    }
}
