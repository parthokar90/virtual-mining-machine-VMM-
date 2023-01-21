<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\VirtualMachine;
use App\Http\Requests\admin\VmmValidateRequest;

class VirtualMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VirtualMachine::orderBy('id','DESC')->paginate(10);
        return view('admin.vmm.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vmm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VmmValidateRequest $request)
    {
        $data=[
          'title'           =>$request->title,
          'winning_amount'  =>$request->winning_amount,
          'lifetime'        =>$request->lifetime,
          'minimum_invest'  =>$request->minimum_invest,
          'distribute_coin' =>$request->distribute_coin,
          'execution_time'  =>$request->execution_time,
          'prepration_time' =>$request->prepration_time,
          'start_time'      =>date('Y-m-d H:i:s',strtotime($request->start_time)),
          'status'          =>$request->status,
        ];

        VirtualMachine::insert($data);

        return redirect()->route('vmm.index')->with('success','Information created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = VirtualMachine::find($id);
        return view('admin.vmm.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VmmValidateRequest $request, $id)
    {

        $data=[
            'title'           =>$request->title,
            'winning_amount'  =>$request->winning_amount,
            'lifetime'        =>$request->lifetime,
            'minimum_invest'  =>$request->minimum_invest,
            'distribute_coin' =>$request->distribute_coin,
            'execution_time'  =>$request->execution_time,
            'prepration_time' =>$request->prepration_time,
            'start_time'      =>date('Y-m-d H:i:s',strtotime($request->start_time)),
            'status'          =>$request->status,
          ];
  
          VirtualMachine::where('id',$id)->update($data);
  
          return redirect()->route('vmm.index')->with('success','Information update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
