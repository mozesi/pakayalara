<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if($updateLanguage)
    @include('livewire.languages.update')
    @else
    @include('livewire.languages.create')
    @endif
    @if(count($languages) > 0)
    @foreach($languages as $language)
    {{$language->name}}
    {{$language->code}}

    <button wire:click="edit({{$language->id}})"> edit</button>
    @endforeach
    @endif
</div>
