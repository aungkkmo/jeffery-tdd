@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{$thread->creator->name }}</a> posted:
                    {{ $thread->title }} 
                </div>

                <div class="card-body">
                    <article>
                        <h4>{{ $thread->body }}</h4>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <br>

    @foreach($thread->replies as $reply)
        @include('threads.reply')
        <br>
        @endforeach
    </div>
</div>
@endsection