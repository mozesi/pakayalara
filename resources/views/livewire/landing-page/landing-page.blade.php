<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @foreach($languages as $language)
    <a class="btn btn-primary" href="{{route('home.page',$language->id)}}">{{$language->name}}</a>
    @endforeach
</div>
