@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
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
                               


                                <table class="table table-bordered">
                                 <tr>
                                    <th>Sl</th>
                                    <th>Vmm</th>
                                    <th>Invest Amount</th>
                                    <th>Invest Date</th>
                                 </tr>

                                 @foreach($invest as $key=> $item)
                                 <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->machineDetails->title}}</td>
                                    <td>{{$item->invest_amount}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                 </tr>
                                 @endforeach 

                             </table>
                             {{$invest->links()}}
                             </div>
                            @endif  
                        </div>
                   </div>  
                </div>
            </div>
      </div>
</div>
@endsection
