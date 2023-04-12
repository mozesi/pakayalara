<?php

namespace App\Http\Livewire\LeftBar;

use Livewire\Component;

use App\Models\Language as Languages;
use App\Models\ProverbComment as Comments;

class LeftBar extends Component
{    
    public $languages;

    public function mount()
    {  
        $this->languages = Languages::all();
       return view('livewire.left-bar.left-bar');
    }
}
