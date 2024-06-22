@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <p>Name: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>EXP: {{ Auth::user()->exp }}</p>
    <p>Level: {{ floor(Auth::user()->exp / 100) + 1 }}</p>
</div>
@endsection
