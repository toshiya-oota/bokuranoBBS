@extends('layouts.layout')

@section('content')
    <h2>検索結果</h2>
    <table border="1">
    @foreach($data as $item)
    <tr>
    <th>
    {{$item->id}}
    <a class="card-link" href="{{ route('posts.show', ['post' => $item]) }}">
    {{$item->title}}
    </a>
    {{$item->created_at}}
    </th>
    </tr>
    @endforeach
    </table>
    <hr>
@endsection