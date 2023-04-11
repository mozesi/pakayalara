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
                    <a wire:model.click ="likeProverb()"title="{{count($proverb->reactions)}} likes"> 
                      <i class="bi bi-heart">0</i>                         
                    </a>
                  </span>
                  <span  class="col-3" >
                    <a class="col-4" href="{{route('proverb-view',$proverb->id)}}">
                      <i class="bi bi-share"></i>
                    </a>
                  </span>
                </div>
             </ul>
             <div class="card-footer">
               <form>
                     <textarea wire:model="comment_description" placeholder="Comment" style="width:100%">
                     </textarea> @error('comment_description') {{$message}}@enderror
                     @error('proverb_id') {{$message}}@enderror
                     <button class="btn btn-primary" wire:click.prevent="saveComment({{$proverb->id}})">comment</button>
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
                                    <a wire:click ="likeComment({{$comment->id}})"title="{{count($comment->reactions)}} likes"> 
                                      <i class="bi bi-heart">{{count($comment->reactions)}}</i>                         
                                    </a>
                                  </span>
                              </div>
                            </div>
                      </div>  
                  </div>
                 @endforeach
               </div>
          </div> 
        </div>
