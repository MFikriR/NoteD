@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Achievements</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achievements as $achievement)
            <tr>
                <td>{{ $achievement->name }}</td>
                <td>{{ $achievement->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
