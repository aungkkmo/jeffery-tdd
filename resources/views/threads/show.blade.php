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
            <br>
        

         @foreach($replies as $reply)
            @include('threads.reply')
            <br>
         @endforeach
         {{$replies->links() }}   

        @if(auth()->check())
            <div class="card-body">
                <form action="{{$thread->path()}}./replies" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="5" class="form-control" placeholder="Have something to say?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            </div>
        @else
            <p class="text-center">Please <a href="{{route('login')}}">sign in </a>to participate in this discussion</p>
        @endif
        
         </div>


        <div class="col-md-4">
           <div class="card">
                <div class="card-body">
                <p>
                    This thread was published {{ $thread->created_at->diffForHumans()}} by 
                    <a href="#">{{ $thread->creator->name }}</a> 
                    and currently has {{$thread->replies_count}} {{str_plural('comment',$thread->replies_count)}}.
                </p>
            </div>
           </div>
        </div>
        
    </div>

    </div>
</div>
@endsection
