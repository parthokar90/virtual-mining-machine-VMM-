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

                    <div class="row">
                        @include('layouts.sidebar')

                        <div class="col-md-9">
                        <table class="table table-bordered">
                                 <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Life time</th>
                                    <th>Minimum Invest</th>
                                    <th>Distribute Coin</th>
                                    <th>Execution Time</th>
                                    <th>Prepration Time</th>
                                    <th>Start Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>

                                 @foreach($data as $key=> $item)
                                 <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{date('h',strtotime($item->lifetime))}}</td>
                                    <td>{{$item->minimum_invest}}</td>
                                    <td>{{$item->distribute_coin}}</td>
                                    <td>{{date('h',strtotime($item->execution_time))}}</td>
                                    <td>{{date('h',strtotime($item->prepration_time))}}</td>
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{route('vmm.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                    </td>
                                 </tr>
                                 @endforeach 

                             </table>
                             {{$data->links()}}
                        </div>
                   </div>  
                </div>
            </div>
      </div>
</div>
@endsection

