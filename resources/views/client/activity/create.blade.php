@extends('layouts.master')

@section('MasterMenu','active')

@push('BreadCrumbMenu')
   <li>Client</li>
   <li>Activity</li>
   <li>Create</li>
@endpush

@section('content')

    <div class="row">
        <div class="col-xs-12">

            @component('layouts.component.panel-head',['MenuTitle'=>'Explore','color'=>env('TABPANELCOLOR')])
                @slot('Button')
                     <a href="{{ action('client\ActivityController@index') }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Back</a>
                @endslot


                @if(isset($Activity))
                    {!! Form::model($Activity,['url' => action('client\ActivityController@update',$Activity->id),'method' => 'put']) !!}
                @else
                    {!! Form::open(['url' => action('client\ActivityController@store'),'method' => 'post']) !!}
                @endif

                <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'eg:Stalin']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('activity', 'Activity') !!}
                            {!! Form::text('activity', null, ['class' => 'form-control','placeholder'=>'eg:Crud Application']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('duration', 'Duration') !!}
                            {!! Form::text('duration', null, ['class' => 'form-control','id'=>'time','placeholder'=>'eg:hh:mm:ss']) !!}

                        </div>
                    </div>                    
                </div>
             
                <div class="box-footer" align="center">
                    <button type="submit" class="btn btn-info">Save <i class="fa fa-save"></i></button>
                      {{-- <input type="text" id="time" placeholder="Time"> --}}

                </div>

                {!! Form::close() !!}

            @endcomponent

        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
    
var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>


@endsection
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>