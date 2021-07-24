<?php $color = array('text-green', 'text-aqua', 'text-yellow','text-primary','text-red'); ?>
<aside class="main-sidebar">
	<div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('assets/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ auth()->user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <section class="sidebar">
        <ul class="sidebar-menu">
        	<li><a href="{{ url('/home') }}"><i class="fa fa-dashboard {{ $color[array_rand($color,1)] }}"></i> <span>Dashboard</span></a></li>

            <li class="header">Client</li>
            <li><a href="{{ action('client\ActivityController@index')}}"><i class="fa fa-tasks {{ $color[array_rand($color,1)] }}"></i><span>Activity</span></a></li>
        </ul>
    </section>
</aside>
