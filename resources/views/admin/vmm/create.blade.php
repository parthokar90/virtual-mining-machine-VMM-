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
                             <form method="post" action="{{route('vmm.store')}}">
                                @csrf 
                                <div class="form-group mt-2 mb-2">
                                    <label>Title</label>
                                    <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Enter Title">
                                </div>

                                 @if($errors->has('title'))
                                   <div>{{ $errors->first('title') }}</div>
                                 @endif

                                 <div class="form-group mt-2 mb-2">
                                    <label>Winning Amount</label>
                                    <input type="text" value="{{old('winning_amount')}}" class="form-control" name="winning_amount" placeholder="Enter Winning Amount">
                                </div>

                                 @if($errors->has('title'))
                                   <div>{{ $errors->first('winning_amount') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Life Time</label>
                                    <input type="time" value="{{old('lifetime')}}" class="form-control" name="lifetime" placeholder="Enter Life Time">
                                </div>

                                 @if($errors->has('lifetime'))
                                   <div>{{ $errors->first('lifetime') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Minimum Invest</label>
                                    <input type="text" value="{{old('minimum_invest')}}" class="form-control" name="minimum_invest" placeholder="Enter Minimum Invest">
                                </div>

                                 @if($errors->has('minimum_invest'))
                                   <div>{{ $errors->first('minimum_invest') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Distribute Coin</label>
                                    <input type="text" value="{{old('distribute_coin')}}" class="form-control" name="distribute_coin" placeholder="Enter Distribute Coin">
                                </div>

                                 @if($errors->has('distribute_coin'))
                                   <div>{{ $errors->first('distribute_coin') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Execution Time</label>
                                    <input type="time" value="{{old('execution_time')}}" class="form-control" name="execution_time" placeholder="Enter Execution Time">
                                </div>

                                 @if($errors->has('execution_time'))
                                   <div>{{ $errors->first('execution_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Prepration Time</label>
                                    <input type="time" value="{{old('prepration_time')}}" class="form-control" name="prepration_time" placeholder="Enter Prepration Time">
                                </div>

                                @if($errors->has('prepration_time'))
                                   <div>{{ $errors->first('prepration_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Start Time</label>
                                    <input type="datetime-local" name="start_time" value="{{old('start_time')}}" class="form-control">
                                </div>

                                 @if($errors->has('start_time'))
                                   <div>{{ $errors->first('start_time') }}</div>
                                 @endif

                                <div class="form-group mt-2 mb-2">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                       <option value="Draft">Draft</option>
                                       <option value="Active">Active</option>
                                       <option value="In Preparation">In Preparation</option>
                                       <option value="Running">Running</option>
                                       <option value="Finished">Finished</option>
                                    </select>
                                </div>

                                 @if($errors->has('status'))
                                   <div>{{ $errors->first('status') }}</div>
                                 @endif

                                <button type="submit" class="btn btn-success">Save</button>
                             </form>
                        </div>
                   </div>  
                </div>
            </div>
      </div>
</div>
@endsection
