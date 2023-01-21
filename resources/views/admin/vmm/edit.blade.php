@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @include('layouts.sidebar')

                        <div class="col-md-9">



                              <h4>User Invest History</h4>
                              <table class="table table-bordered">
                                <tr>
                                  <th>Invest</th>
                                </tr>
                                @foreach($data->userInvest as $invest)
                                <tr>
                                  <th>{{$invest->invest_amount}}</th>
                                </tr>
                                @endforeach 
                              </table>


                             <form method="post" action="{{route('vmm.update',$data->id)}}">
                                @csrf 
                                {{@method_field('PATCH')}}
                                <div class="form-group mt-2 mb-2">
                                    <label>Title</label>
                                    <input type="text" value="{{$data->title}}" class="form-control" name="title" placeholder="Enter Title">
                                </div>

                                 @if($errors->has('title'))
                                   <div>{{ $errors->first('title') }}</div>
                                 @endif

                                 <div class="form-group mt-2 mb-2">
                                    <label>Winning Amount</label>
                                    <input type="text" value="{{$data->winning_amount}}" class="form-control" name="winning_amount" placeholder="Enter Winning Amount">
                                </div>

                                 @if($errors->has('title'))
                                   <div>{{ $errors->first('winning_amount') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Life Time</label>
                                    <input type="time" value="{{$data->lifetime}}" class="form-control" name="lifetime" placeholder="Enter Life Time">
                                </div>

                                 @if($errors->has('lifetime'))
                                   <div>{{ $errors->first('lifetime') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Minimum Invest</label>
                                    <input type="text" value="{{$data->minimum_invest}}" class="form-control" name="minimum_invest" placeholder="Enter Minimum Invest">
                                </div>

                                 @if($errors->has('minimum_invest'))
                                   <div>{{ $errors->first('minimum_invest') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Distribute Coin</label>
                                    <input type="text" value="{{$data->distribute_coin}}" class="form-control" name="distribute_coin" placeholder="Enter Distribute Coin">
                                </div>

                                 @if($errors->has('distribute_coin'))
                                   <div>{{ $errors->first('distribute_coin') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Execution Time</label>
                                    <input type="time" value="{{$data->execution_time}}" class="form-control" name="execution_time" placeholder="Enter Execution Time">
                                </div>

                                 @if($errors->has('execution_time'))
                                   <div>{{ $errors->first('execution_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Prepration Time</label>
                                    <input type="time" value="{{$data->prepration_time}}" class="form-control" name="prepration_time" placeholder="Enter Prepration Time">
                                </div>

                                @if($errors->has('prepration_time'))
                                   <div>{{ $errors->first('prepration_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Start Time</label>
                                    <input type="datetime-local" name="start_time" value="{{$data->start_time}}" class="form-control">
                                </div>

                                 @if($errors->has('start_time'))
                                   <div>{{ $errors->first('start_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                       <option value="Draft"@if($data->status=='Draft') selected @endif>Draft</option>
                                       <option value="Active" @if($data->status=='Active') selected @endif>Active</option>
                                       <option value="In Preparation" @if($data->status=='In Preparation') selected @endif>In Preparation</option>
                                       <option value="Running" @if($data->status=='Running') selected @endif>Running</option>
                                       <option value="Finished" @if($data->status=='Finished') selected @endif>Finished</option>
                                    </select>
                                </div>

                                 @if($errors->has('status'))
                                   <div>{{ $errors->first('status') }}</div>
                                 @endif

                                <button type="submit" class="btn btn-success">Update</button>
                             </form>
                        </div>
                   </div>  
                </div>
            </div>
      </div>
</div>
@endsection
