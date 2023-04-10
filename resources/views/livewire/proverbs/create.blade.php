

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

    <button wire:click.prevent="store()">Save</button>
</form>