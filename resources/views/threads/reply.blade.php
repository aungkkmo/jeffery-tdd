    <div class="row justify-content-center">
        <div class="col-md-8">
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
            </div>
        </div>