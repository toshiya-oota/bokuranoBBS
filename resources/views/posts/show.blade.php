@extends('layouts.layout')

@section('content')
  <!--
    <div class="container mt-4">
        <div class="border p-4">
           <div class="mb-4 text-right">
              <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
              編集する
              </a>
            
            <form
            style="display: inline-block;"
            method="POST"
            action="{{ route('posts.destroy', ['post' => $post]) }}"
            >
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">削除する</button>
            </form>
          </div> 
          -->
            <h1 class="h5 mb-4">
                板名:{{ $post->title }}
            </h1>

            <p class="mb-5">
                {{ $post->body}}
            </p>
            
            <section>
                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                          氏名:{!! nl2br(e($comment->name)) !!}
                        </p>
                        <p>{!! nl2br(e($comment->content)) !!}
                        </p>

                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
            <section>
            <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf

            <input
            name="post_id"
            type="hidden"
            value="{{ $post->id }}"
            >

           <div class="form-group">
                <label for="name">
                    氏名
                </label>
                <input
                      id="name"
                      name="name"
                      class=" {{ $errors->has('name') ? 'is-invalid' : '' }}"
                      value="名無し"
                      type="text"
                >
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
            <label for="content"></label>
            <textarea
            id="content"
            name="content"
            class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
            rows="4"
            >{{ old('content') }}</textarea>
            @if ($errors->has('content'))
            <div class="invalid-feedback">
                {{ $errors->first('content') }}
            </div>
            @endif
            </div>

            <div class="mt-4">
            <button type="submit" class="btn btn-primary">
              書き込む
            </button>
            </div>
            </form>
        </div>
    </div>
@endsection