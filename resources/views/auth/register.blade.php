@extends('layouts.app')

@section('title','Register')

@section('content')

<h2>Register</h2>

<br>

<form action="/register" method="POST">

    @csrf

    <p>Name</p>

    <input
        type="text"
        name="name"
        style="width:300px;padding:8px;"
    >

    <br><br>

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
        Register
    </button>

</form>

@endsection