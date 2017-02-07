@extends('layouts.app')

@section('title', 'User info')

@section('content')
    <div class="page-header">
        <h1 id="tables">User info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>Name</td><td>{{ $data['name'] }} </td></tr>
                <tr><td>Birthday</td><td>{{ $data['birthday'] }} </td></tr>
                <tr><td># of friends</td><td>{{ $data['context']['mutual_friends']['summary']['total_count'] }} </td></tr>
                <tr><td>Liked Pages</td>
                    <td>
                    @forelse ($data['context']['mutual_likes']['data'] as $item)
                        <li><a href="https://fb.com/{{ $item['id'] }}">{{ $item['name'] }}</a></li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Devices</td>
                    <td>
                    @forelse ($data['devices'] as $item)
                        <li>{{ $item['os'] }}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Education</td>
                    <td>
                    @forelse ($data['education'] as $item)
                        <li>{{ $item['school']['name'] }} {{ $item['year']['name'] }}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Email</td><td>{{ $data['email'] }} </td></tr>
                <tr><td>Gender</td><td>{{ $data['gender'] }} </td></tr>
                <tr><td>Hometown</td><td>{{ $data['hometown']['name'] }} </td></tr>
                <tr><td>Languages</td>
                    <td>
                    @forelse ($data['languages'] as $item)
                        <li>{{ $item['name'] }}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Location</td><td>{{ $data['location']['name'] }} </td></tr>
                <tr><td>Cover photo</td><td><img src="{{ $data['cover']['source'] }}"></td></tr>
            </tbody>
        </table>
    </div>
@endsection