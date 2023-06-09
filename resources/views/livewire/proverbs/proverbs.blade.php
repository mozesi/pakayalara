
<div>
<!-- Start. Modal for adding a proverb. this is triggered by the add button below.-->
<div wire:ignore.self class="modal fade" id="addProverbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <p>
                    <select type ="select" id ="languageName"
                    wire:model='language_id'>
                        @foreach($languages as $language)
                            <option value="{{$language->id}}">{{$language->id}} {{$language->name}}</option>
                        @endforeach
                    </select>
                    @error('language_id') {{$message}}@enderror                  
                </p>
                <p>
                <input type ="text" id ="proverbName" placeholder="Enter Proverb"
                wire:model="name"/> @error('name') {{$message}}@enderror
                </p>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="store()">Save changes</button>
        </div>
      </div>
    </div>
</div>

<!-- End. Modal for adding a proverb. this is triggered by the add button below. -->
<div class="card" style="width:100%">
  <button type="button" wire:click="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProverbModal">
   Add Proverb
   </button> 
</div>

<!-- Start. Search bar for searching proverbs from the provided list -->
<div class="input-group" style="width:100%">
 <input type="text"  class="form-control" placeholder="Search" wire:model="searchWord" />
</div>
<!-- Display lis of Proverbs, with a modal for adding comments to the proverb.-->
@if(count($proverbs)>0)
    @foreach($proverbs as $proverb)
<!--Modal for adding comment to proverb -->
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
              @error('comment_description') <i class="text-danger"> {{$message}} </i>@enderror
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
<!-- end. add modal to comment 
-->
            <div   class="card" style="width:100%; margin-top:2px;">
              <a href='{{url("proverbs/$language->code/$proverb->id")}}'>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$proverb->name}}</li>
                </ul>
              </a>  
                <div class="card-footer">
                    <div class="row">
                      @if(Auth::check())
                        <span  class="col-3" >
                          <a  class="col-4" data-bs-toggle="modal" data-bs-target="#commentModal{{$proverb->id}}">
                            <i class="bi bi-chat">{{count($proverb->comments)}}</i>
                          </a>
                        </span>
                        <span  class="col-3" >
                          <a wire:click ="likeProverb({{$proverb->id}})"> 
                            <i class="bi bi-hand-thumbs-up">{{count($proverb->reactions)}}</i>                
                          </a>
                        </span>
                      @else
                      <span  class="col-3" >
                        <a  class="col-4" title="Log In to comment">
                          <i class="bi bi-chat">{{count($proverb->comments)}}</i>
                        </a>
                      </span>
                      <span  class="col-3" >
                        <a  title="Log In to like"> 
                          <i class="bi bi-heart">{{count($proverb->reactions)}}</i>                         
                        </a>
                      </span>
                      @endif
                    </div>
                  </div>
            </div>
        @endforeach
@endif
