@extends('layouts.app')

@section('title','Login')

@section('content')

<h2>Login</h2>

<br>

<form action="/login" method="POST">

    @csrf

    <p>Email</p>

    <input
        type="email"
        name="email"
        style="width:300px;padding:8px;"
    >

    <br><br>

    <p>Password</p>

    <input
        type="password"
        name="password"
        style="width:300px;padding:8px;"
    >

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

@endsection