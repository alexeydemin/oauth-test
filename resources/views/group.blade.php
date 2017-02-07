@extends('layouts.app')

@section('title', 'Group info')

@section('content')
    <div class="page-header">
        <h1 id="tables">Group info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>About</td><td>{{ $data['about'] or '' }} </td></tr>
                <tr><td>Country</td><td>{{ $data['location']['country'] or ''}} </td></tr>
                <tr><td>City</td><td>{{ $data['location']['city'] or ''}} </td></tr>
                <tr><td>Street</td><td>{{ $data['location']['street'] or ''}} </td></tr>
                <tr><td>GPS</td><td>{{ $data['location']['latitude'] or '' . ', ' . $data['location']['longitude'] or '' }} </td></tr>
                <tr><td>Zip</td><td>{{ $data['location']['zip'] or ''}} </td></tr>
                <tr><td>Website</td><td>{{ $data['website'] or '' }} </td></tr>
            </tbody>
        </table>
    </div>
@endsection