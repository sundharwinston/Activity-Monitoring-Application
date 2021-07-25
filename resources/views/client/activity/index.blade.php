@extends('layouts.master')

@section('MasterMenu','active')

@push('BreadCrumbMenu')
   <li>Activity</li>
@endpush

@section('content')

    <div class="row">
        <div class="col-xs-12">

            @component('layouts.component.panel-head',['MenuTitle'=>'Activity','color'=>env('TABPANELCOLOR')])
                @slot('Button')
                     <a href="{{ action('client\ActivityController@create')}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Add</a>
                @endslot

                <meta name="csrf-token" content="{{ csrf_token() }}">
                <table class="table table-bordered" id="ActivityTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($Activity))

                                @foreach($Activity as $Activities)
                                    <tr>
                                        <td>{{$Activities->name}}</td>
                                        <td>{{$Activities->date}}</td>
                                        <td>{{$Activities->activity}}</td>
                                        <td>{{$Activities->duration}}</td>
                                        <td>
                                       <form action="{{ action('client\ActivityController@destroy',$Activities->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a href="{{ action('client\ActivityController@edit',$Activities->id) }}" class="btn"><i class="fa fa-pencil text-aqua"></i></a>
                                            <button href="" onclick="return confirm('Are you sure?')" class="btn"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                    @endif
                    </tbody>
                </table><br>
                    @if(isset($TotalHours))
                        <td><label>Total Working Hours :</label></td>
                        <td>{{$TotalHours}}</td>
                    @endif

            @endcomponent

        </div>
    </div>

@endsection
