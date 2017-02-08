@extends('layouts.app')

@section('title', 'Group info')

@section('content')
    <div class="page-header">
        <h1 id="tables">Group info</h1>
    </div>
    <div class="bs-component">
        <table class="table table-striped table-hover ">
            <tbody>
                <tr><td>Channels</td>
                    <td>
                        @forelse ($data['items'] as $item)
                            <li><a target="_blank "href="https://youtube.com/channel/{{ $item['snippet']['resourceId']['channelId'] }}">Channel</a></li>
                        @empty
                            <p>No items</p>
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection