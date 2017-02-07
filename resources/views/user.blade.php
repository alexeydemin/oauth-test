@extends('layouts.app')

@section('title', 'User info')

@section('content')
    <div class="page-header">
        <h1 id="tables">User info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>Name</td><td>{{ $data['name'] or '' }} </td></tr>
                <tr><td>Birthday</td><td>{{ $data['birthday'] or '' }} </td></tr>
                <tr><td># of friends</td><td>{{ $data['context']['mutual_friends']['summary']['total_count'] or '' }} </td></tr>
                <tr><td>Liked Pages</td>
                    <td>
                    @forelse ($data['context']['mutual_likes']['data'] as $item)
                        <li><a href="{{ route('page', ['id' => $item['id'] ]) }}">{{ $item['name'] }}</a></li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Devices</td>
                    <td>
                    @forelse ($data['devices'] as $item)
                        <li>{{ $item['os'] or ''}}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Education</td>
                    <td>
                    @forelse ($data['education'] as $item)
                        <li>{{ $item['school']['name'] or ''}} {{ $item['year']['name'] or '' }}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Email</td><td>{{ $data['email'] or '' }} </td></tr>
                <tr><td>Gender</td><td>{{ $data['gender'] or '' }} </td></tr>
                <tr><td>Hometown</td><td>{{ $data['hometown']['name'] or '' }} </td></tr>
                <tr><td>Languages</td>
                    <td>
                    @forelse ($data['languages'] as $item)
                        <li>{{ $item['name'] }}</li>
                    @empty
                        <p>No items</p>
                    @endforelse
                    </td>
                </tr>
                <tr><td>Location</td><td>{{ $data['location']['name'] or '' }} </td></tr>
                <tr><td>Cover photo</td><td><img src="{{ $data['cover']['source'] or '' }}"></td></tr>
                <tr><td>Few random groups since FB doesn't allow get all user groups</td>
                    <td>
                        <li><a href="{{ route('group', ['id' => 714685238558448 ]) }}">{{ 'Group1' }}</a></li>
                        <li><a href="{{ route('group', ['id' => 686981921352307 ]) }}">{{ 'Group2' }}</a></li>
                        <li><a href="{{ route('group', ['id' => 206802742684099 ]) }}">{{ 'Group3' }}</a></li>
                    </td></tr>
            </tbody>
        </table>
    </div>
@endsection