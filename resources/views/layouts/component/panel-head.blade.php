@section('BreadCrumb')
<h4 class="slide-in-blurred-right">{{ @$MenuTitle }}</h4>
<ol class="breadcrumb">
    <li class="slide-in-blurred-right"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @stack('BreadCrumbMenu')
</ol>
@endsection

<div class="box box-{{ @$Color?$Color:env('TABPANELCOLOR') }}">
    @if(@$Title || @$Button)
        <div class="box-header with-border">
            <h4 class="box-title">{{ @$Title }}</h4>
            <div class="box-tools pull-right">
               {{ @$Button }}
            </div>
        </div>
    @endif
    <div class="box-body">
        {{ $slot }}
    </div>
</div>


<style type="text/css">
    .slide-in-blurred-right{-webkit-animation:slide-in-blurred-right .10s cubic-bezier(.23,1.000,.32,1.000) both;animation:slide-in-blurred-right .6s cubic-bezier(.23,1.000,.32,1.000) both}

@-webkit-keyframes slide-in-blurred-right{0%{-webkit-transform:translateX(1000px) scaleX(2.5) scaleY(.2);transform:translateX(1000px) scaleX(2.5) scaleY(.2);-webkit-transform-origin:0 50%;transform-origin:0 50%;-webkit-filter:blur(40px);filter:blur(40px);opacity:0}100%{-webkit-transform:translateX(0) scaleY(1) scaleX(1);transform:translateX(0) scaleY(1) scaleX(1);-webkit-transform-origin:50% 50%;transform-origin:50% 50%;-webkit-filter:blur(0);filter:blur(0);opacity:1}}@keyframes slide-in-blurred-right{0%{-webkit-transform:translateX(1000px) scaleX(2.5) scaleY(.2);transform:translateX(1000px) scaleX(2.5) scaleY(.2);-webkit-transform-origin:0 50%;transform-origin:0 50%;-webkit-filter:blur(40px);filter:blur(40px);opacity:0}100%{-webkit-transform:translateX(0) scaleY(1) scaleX(1);transform:translateX(0) scaleY(1) scaleX(1);-webkit-transform-origin:50% 50%;transform-origin:50% 50%;-webkit-filter:blur(0);filter:blur(0);opacity:1}}

</style>