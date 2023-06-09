<div> 
      <div wire:ignore.self class="modal fade" id="commentModal{{$proverb->id}}" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">{{$proverb->name}}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <p>
                    <textarea  type ="text" id ="commentDescription" placeholder="Write Comment"
                    wire:model="comment_description" style="width:100%">
                    </textarea>
                    @error('name') {{$message}}@enderror
                    </p>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent="saveComment({{$proverb->id}})">Comment</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end add modal to comment -->
      
          <div class="card" style="width:100%; margin-top:2px;">
             <ul  class="list-group list-group-flush">
               <li class="list-group-item">{{$proverb->name}}</li>
             </ul>
             <ul  class="list-group list-group-flush">
              <div class="row">
                <span  class="col-3" >
                  <a  class="col-4"  data-bs-toggle="modal"  title="{{count($proverb->comments)}} comments">
                    <i class="bi bi-chat">{{count($proverb->comments)}}</i>
                  </a>
                  </span>
                  <span  class="col-3" >
                    @if(Auth::check())
                      <a wire:click ="likeProverb({{$proverb->id}})" title="{{count($proverb->reactions)}} marks"> 
                        <i class="bi bi-check2"">{{count($proverb->reactions)}} </i>                         
                    </a>
                    @else
                    <a title="{{count($proverb->reactions)}} marks"> 
                        <i class="bi bi-check2">{{count($proverb->reactions)}} </i>                         
                      </a>
                    @endif
                  </span>
                </div>
             </ul>
             <div class="card-footer">
               <form>
                     <textarea wire:model="comment_description" placeholder="Comment" style="width:100%">
                     </textarea> @error('comment_description') {{$message}}@enderror
                     @error('proverb_id') {{$message}}@enderror
                     @if(Auth::check())
 <button class="btn btn-primary" wire:click.prevent="saveComment({{$proverb->id}})">comment</button>                   
                     @else
                     <button disabled class="btn btn-primary" wire:click.prevent="saveComment({{$proverb->id}})">comment</button>
                       
                     @endif
                    </form>
            </div>
               <div class="card-footer">
                @foreach($proverb->comments as $comment)
                  <div class="row">
                      <div   class="card" style="width:100%; margin-top:2px;">
                        <a>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">{{$comment->comment_description}}</li>
                          </ul>
                        </a>  
                          <div class="card-footer">
                              <div class="row">
                                  <span  class="col-3" >
                                    @if(Auth::check())

                                    <a wire:click ="likeComment({{$comment->id}})" title="{{count($comment->reactions)}} marks"> 
                                        <i class="bi bi-check2">{{count($comment->reactions)}}</i>                         
                                    </a>
                                    @else
                                    <a title="{{count($comment->reactions)}} marks"> 
                                        <i class="bi bi-check2">{{count($comment->reactions)}}</i>                         
                                      </a>
                                    @endif
                                  </span>
                              </div>
                            </div>
                      </div>  
                  </div>
                 @endforeach
               </div>
          </div> 
        </div>
