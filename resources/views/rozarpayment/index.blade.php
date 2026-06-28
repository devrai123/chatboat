@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<form action="{{ route('rozarpayments.store') }}" method="POST">
    @csrf
    <div class="inline">
        <label for="amount">Amount</label>
        <input type="text" placeholder="Enter the ammount" class="form-group" name="amount">
        <button type="submit" class="btn btn-success">Pay Now</button>
    </div>
</form>


@endsection