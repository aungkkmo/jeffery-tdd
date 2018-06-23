<div class="card">
    <div class="card-header">
    <a href="#">{{$reply->owner->name }} </a>
        said 
    {{ $reply->created_at->diffForhumans() }}..
    </div>
    <div class="card-body">
        <article>
            <h4>{{ $reply->body }}</h4>
        </article>
    </div> 
    
</div>
            
   