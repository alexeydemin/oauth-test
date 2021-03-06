@extends('layouts.app')

@section('title', 'Page info')

@section('content')
    <div class="page-header">
        <h1 id="tables">Page info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>About</td><td>{{ $data['about'] or '' }} </td></tr>
                @if( !empty($data['location']) )
                    <tr><td>Country</td><td>{{ $data['location']['country'] or ''}} </td></tr>
                    <tr><td>City</td><td>{{ $data['location']['city'] or ''}} </td></tr>
                    <tr><td>Street</td><td>{{ $data['location']['street'] or ''}} </td></tr>
                    @if( !empty($data['location']['latitude']) &&  !empty($data['location']['longitude']))
                    <tr><td>GPS</td><td>{{ $data['location']['latitude'] . ', ' . $data['location']['longitude'] }} </td></tr>
                    @endif
                    <tr><td>Zip</td><td>{{ $data['location']['zip'] or ''}} </td></tr>
                @endif
                <tr><td>Website</td><td>{{ $data['website'] or '' }} </td></tr>
                @if( !empty($data['likes']) )
                <tr><td>Likes</td>
                    <td>
                        @forelse ($data['likes']['data'] as $item)
                            <li>{{ $item['name'] }}</li>
                        @empty
                            <p>No items</p>
                        @endforelse
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection