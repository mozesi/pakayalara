<?php

namespace App\Http\Livewire\Proverbs;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Proverb as Proverbs;
use App\Models\Language as Languages;
use App\Models\ProverbMeaning as Meanings;
use App\Models\ProverbComment as Comments;
use App\Models\ProverbReaction as ProverbReaction;

class ProverbShow extends Component
{
    public $name, $proverb_id, $language_id, $proverbs, $languages;
    public $status;
    public $meaning_en,$local_sentence,$en_sentence;
    public $likes, $unlikes,$comment_description;
    public $proverb, $comment_proverb_id;
    
    use WithPagination;
    public $searchWord;

    public $rules =[
        'name' => 'required',
        'language_id' =>'required'
    ];
    public $commentRules =[
        'comment_description' => 'required'
    ];

    public $lanId;
    public function render(){   
        $lanId = \Route::current()->parameter('id');
        $searchWord = '%'.$this->searchWord.'%';

         if($lanId >=1){
            $this->lanId = $lanId;
            $this->proverbs  = Proverbs::
            where('language_id','=',$this->lanId)->
            where('name','like',$searchWord)->get();
         }else{
            $this->proverbs  = Proverbs::
            where('language_id','=',$this->lanId)->
            where('name','like',$searchWord)->get();
         }
        $this->languages = Languages::all();
        return view('livewire.proverbs.proverbs');
    } 
    public function store(){
        $this->validate($this->rules);
        Proverbs::create([
            'name' => $this->name,
            'language_id' => $this->language_id
        ]);

        $this->resetFields();
    }
    public function addMeaning($proverbId){
        $this->proverb = Proverbs::findOrFail($proverbId);
        $this->name = $this->proverb ->name;
        $this->proverb_id = $this->proverb ->id;
    }
    public function saveMeaning(){
        Meanings::create([
            'meaning_en' => $this->meaning_en,
            'local_sentence' => $this->local_sentence,
            'en_sentence' => $this->en_sentence,
            'proverb_id'  => $this->proverb_id
        ]);
        $this->resetFields();
        return redirect()->to('/');
    }
    public function saveComment($commentedProverbId){
        $this->validate($this->commentRules);
        Comments::create([
            'comment_description' => $this->comment_description,
            'user_id' => Auth::id(),
            'proverb_id' => $commentedProverbId,
        ]);
        $this->resetFields();
    }
    public function view($proverbId){
        $this->status = 1;
        $this->proverb = Proverbs::findOrFail($proverbId);
       // return view('livewire.proverbs.view');
    }
    public function resetFields(){
        $this->name ="";
        $this->language_id ="";
        $this->meaning_en="";
        $this->local_sentence="";
        $this->en_sentence="";
        $this->proverb_id="";
    }
    public function likeProverb($id){
        $likes = ProverbReaction::where('user_id','=', Auth::id())
        ->where('proverb_id','=', $id)->get();
        if(count($likes) >= 1){
            ProverbReaction::where('user_id','=', Auth::id())
            ->where('proverb_id','=', $id)->delete();
        }
        else{
            ProverbReaction::create([
                'user_id' => Auth::id(),
                'proverb_id' => $id,
            ]);
        }
    }
}
