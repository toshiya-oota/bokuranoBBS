@extends('layouts.layout')

<div>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
      新しい板を立てる
    </a>
    <p>誰でも好きな板を立ててね！</p>
    <p style="color:red;">※炎上は管理人が消火するので注意だよ(>_<)</p>
</div>
<div>
    <form action="/" method="post" style="display:block;;">
        @csrf
        <input type="text" id="find" name="find"
         value="">
        <input type="submit" value="板を検索">
    </form>  
</div>

<div>
    <a href="https://twitter.com/v8no39nyM7sUTgC" target="_blank">管理人に連絡する。</a>
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
                        作成日 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    <span class="mr-2">
                        更新日時 {{ $post->updated_at }}
                    </span>
                    
                    <span class="mr-2">
                        作成者 {{ $post->namemakeboard }}
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