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

    @if(auth()->check())
     <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <form action="{{$thread->path()}}./replies" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Have something to say?"></textarea>
                </div>

                <button type="submit" class="btn btn-default">Post</button>
            </form>
        </div>
    </div>
    @else
        <p class="text-center">Please <a href="{{route('login')}}">sign in </a>to participate in this discussion</p>
    @endif
    </div>
</div>
@endsection
