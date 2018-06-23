@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="page-heading">
			<h1>
				{{$profileUser->name}}
			</h1>
			<small>Since {{$profileUser->created_at->diffForHumans()}}</small>
		</div>
	</div>

	<div class="card">
        <div class="card-body">
          	@foreach($threads as $thread)
		        <article>
		            <div class="level">
			             <h4 class="flex">
			             	<a href=#">{{$thread->creator->name }}</a> posted :{{ $thread->title }}
			             </h4>
		               
		               <span>
		               		{{$thread->created_at->diffForHumans()}}
		               </span>
		            </div>
					<hr/>
		            <div>{{ $thread->body }}</div>
		            </article>                    
			@endforeach
			{{$threads->links()}}
        </div>
    </div>
@endsection