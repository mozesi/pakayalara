

<form>
    <p>
    <input type ="text" id ="languageName" placeholder="Name"
    wire:model="name"/> @error('name') {{$message}}@enderror
    </p>
    <p>
      <input type ="text" id ="languageCode" placeholder="Code"
        wire:model="code"/> @error('code') {{$message}}@enderror
    </p>
    <button wire:click.prevent="store()">Save</button>
</form>