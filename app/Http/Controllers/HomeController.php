<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\VirtualMachine;
use App\Models\user\InvestHistory;
use App\Models\user\UserDetails;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = VirtualMachine::orderBy('id','DESC')->where('status','!=','Draft')->paginate(10);
        return view('home',compact('data'));
    }

     /**
     * user invest request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function userInvest(Request $request,$id){
        $request->validate([
            'invest_amount' => 'required|integer',
        ]);

        $machineDetails = VirtualMachine::find($id);
        $preparation_time=date('i',strtotime($machineDetails->prepration_time));
        $current_time = date('d-m-Y H:i:s');
        $invest_date = date("d-m-Y H:i:s", strtotime("-$preparation_time minutes", strtotime($machineDetails->start_time)));

        // check invest before date
        if($current_time>$invest_date){
            return redirect()->back()->with('error','You can not invest at this time');
        }

        //check minimum invest amount
        if($request->invest_amount<$machineDetails->minimum_invest){
            return redirect()->back()->with('error','Your invest amount must be greater than or equal '.$machineDetails->minimum_invest . '$');
        }
       
        $invest = [
            'user_id'=>auth()->user()->id,
            'machine_id'=>$id,
            'invest_amount'=>$request->invest_amount,
            'created_at'=>Carbon::now()
        ];

        InvestHistory::insert($invest);

        //when invest done user wallet money has been deduct
        $current_amount=auth()->user()->userDetails->taka-$request->invest_amount;
        UserDetails::where('user_id',auth()->user()->id)->update([
          'taka'=> $current_amount
        ]);

        return redirect()->back()->with('success','Your invest has been done');

     }

    /**
     * machine details.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function machineDetails($id){
        $item = VirtualMachine::find($id);
        return view('user.machineDetails',compact('item'));
     }

    /**
     * user invest history.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function investHistory(){
        $invest = InvestHistory::where('user_id',auth()->user()->id)->with('machineDetails')->paginate(10);
        return view('user.invest.history',compact('invest'));
     }


}
