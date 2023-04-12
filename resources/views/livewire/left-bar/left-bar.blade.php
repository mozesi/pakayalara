<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <ul class="list-group">
    @foreach($languages as $language)
    <a href='{{url("language/$language->code/proverbs/$language->id")}}'>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{$language->name}}</div>
              </div>          
             <span class="badge bg-primary rounded-pill">{{count($language->proverbs)}}</span>
        </li>
    </a>
    @endforeach
    </ul>   
</div>
