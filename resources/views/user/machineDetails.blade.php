@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>opps!!! {{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
                   @endif

                    <div class="row">
                        @include('layouts.sidebar')

                        <div class="col-md-9">
                            <h5> Welcome:  {{auth()->user()->name}} </h5>

                            @if(auth()->user()->role=='user')
                             <div class="row">
                                <div class="col-md-6">
                                    Available TK: {{auth()->user()->userDetails->taka}}
                                </div>

                                <div class="col-md-6">
                                    Available Coin: {{auth()->user()->userDetails->coin}}
                                </div>
                               
                                  <div class="col-md-3 card mt-2 mb-2">
                                    {{$item->status}} VMM
                                    <div class="text-center">
                                        <img src="{{asset('image/vmm.png')}}">
                                        <h6>{{$item->title}}</h6>
                                        </hr>
                                        <span>Wining Amount {{$item->winning_amount}}$</span>
                                        </hr>
                                    </div>
                                    <span class="mt-1 mb-1">Start at: {{$item->start_time}}</span>
                                    <span class="mt-1 mb-1">Execution/Running Time: {{date('i',strtotime($item->execution_time))}} Seconds</span>
                                    <span class="mt-1 mb-1">Minimum invest: {{$item->minimum_invest}}$</span>
                                    <span class="mt-1 mb-1">Preparation Time: {{date('i',strtotime($item->prepration_time))}} Minutes</span>
                                    <span class="mt-1 mb-1">My Invest: {{$item->myInvest($item->id)}}</span>

                                    <div class="text-center">
                                        @if($item->status=='In Preparation' || $item->status=='Running')
                                          @else 
                                          <form method="post" action="{{route('machine_invest',$item->id)}}">
                                            @csrf 
                                          <input type="text" name="invest_amount" class="form-control" placeholder="Invest Amount">
                                          <button type="submit" class="btn btn-success mt-3 mb-3">Invest Now</button>
                                         </form>
                                        @endif 
                                    </div>
                                 
                                  </div>
                             </div>
                            @endif  
                        </div>
                   </div>  
                </div>
            </div>
      </div>
</div>
@endsection
