<div class="card">
    <div class="card-header">
        <div class="level">
           <h5 class="flex">
                <a href="#">{{$reply->owner->name }} </a>
                said 
                {{ $reply->created_at->diffForhumans() }}..
           </h5>

             <div>
                <form method="POST" action="/replies/{{$reply->id}}/favorites">
                    {{csrf_field()}}

                    <button class="btn btn-default" type="submit" {{$reply->isFavorited() ? 'disabled' :''}}>
                        {{$reply->favorites_count}} {{str_plural('Favorite',$reply->favorites_count)}}
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
   

    <div class="card-body">
        <article>
            <h4>{{ $reply->body }}</h4>
        </article>
    </div> 
    
</div>
            
   