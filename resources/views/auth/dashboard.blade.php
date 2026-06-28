@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<style>
    *{
        padding: auto;
        margin: 2px;
    }
</style>
<div id="dashboard">

    <h2>Dashboard</h2>
    
    <hr>
    
    <h3>
        Welcome {{ Auth::user()->name }}
    </h3>
    
    <p>
        Email : {{ Auth::user()->email }}
    </p>
</div>

@endsection