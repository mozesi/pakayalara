<?php

namespace App\Http\Livewire\LandingPage;

use Livewire\Component;
use App\Models\Language as Language;

class LandingPage extends Component
{   
    public $languages;
    
    public function render()
    {
        $this->languages = Language::all();
        return view('livewire.landing-page.landing-page');
    }
}
