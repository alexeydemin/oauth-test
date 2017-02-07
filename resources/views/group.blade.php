@extends('layouts.app')

@section('title', 'Group info')

@section('content')
    <div class="page-header">
        <h1 id="tables">Group info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>Name</td><td>{{ $data['name'] or ''}} </td></tr>
                <tr><td>Description</td><td>{{ $data['description'] or '' }} </td></tr>
                <tr><td>Email</td><td>{{ $data['email'] or ''}} </td></tr>
                <tr><td>Icon</td><td><img src="{{ $data['icon'] or '' }}"></td></tr>
                <tr><td>Owner</td><td>{{ $data['owner']['name'] or '' }} </td></tr>
                <tr><td>Updated time</td><td>{{ $data['updated_time'] or ''}} </td></tr>
            </tbody>
        </table>
    </div>
@endsection