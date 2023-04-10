
    <p>
        {{$proverb->name}}
    <p>
    @if(count($proverb->Meanings)>0)
        <form>
                <label value = "Meaning">
                <TextArea type ="text" id ="proverbName" placeholder="Meaning in English"
                wire:model="meaning_en"> </TextArea> @error('name') {{$message}}@enderror
            </p>
            <p>
                <label value = "Local sentence">
                <TextArea type ="text" id ="proverbName" placeholder="Local Sentence"
                wire:model="local_sentence"> </TextArea> @error('name') {{$message}}@enderror
            </p>
            <p>
                <label value = "English Sentence">
                <TextArea type ="text" id ="proverbName" placeholder="English Sentence"
                wire:model="en_sentence"> </TextArea> @error('name') {{$message}}@enderror
            </p>
            <button wire:click.prevent="saveMeaning()">Save Meaning</button>
        </form>
    @endif
    @if(count($proverb->Comments)>0)
        @foreach($proverb->comments as $comment)
        <p>{{$comment->comment_description}}</p>
        @endforeach
    @endif
<form>
    <p>
        <input type = "hidden" wire:model="proverbs_id"/>
        <label value = "Local sentence">
        <TextArea type ="text" id ="commentDescription" placeholder="Comment"
        wire:model="comment_description"> </TextArea> 
    </p>
    <button wire:click.prevent="saveComment()">comment</button>

</form>