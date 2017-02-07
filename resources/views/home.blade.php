@extends('layouts.app')

@section('title', 'Start point')

@section('content')

    <div class="container">
        <div class="row vertical-align">
            <div class="col-xs-6 right">
                <a href="{{ $fb_url }}">Login with Facebook</a>
            </div>
            <div class="col-xs-6">
                Body content
            </div>
        </div>
    </div>
@endsection