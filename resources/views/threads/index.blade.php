@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Threads</div>

                <div class="card-body">
                    @foreach($threads as $thread)
                        <article>
                            <div class="level">
                                <h4>    
                                    <a href="#">{{$thread->creator->name }}</a> posted :{{ $thread->title }}
                                 </h4>
                        
                                <a href="{{$thread->path()}}">
                                    <strong>{{$thread->replies_count}} 
                                        {{str_plural('reply',$thread->replies_count)}}
                                    </strong>
                                </a>
                            </div>

                            <div>{{ $thread->body }}</div>
                            </article>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
