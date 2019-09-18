@extends('layouts.layout')

<div class="mb-4">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        新しい板を立てる
    </a>
</div>

@section('content')
    <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        {{ $post->title }}
                    </a>
                </div>

                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-5">
      {{ $posts->links() }}
    </div>
@endsection