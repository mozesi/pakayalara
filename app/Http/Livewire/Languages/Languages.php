<?php

namespace App\Http\Livewire\Languages;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Language as Language;

class Languages extends Component
{
    use AuthorizesRequests;

    public $languages, $name, $code, $language_id;
    public $updateLanguage = false;

    //validation rules
    protected $rules = [

        'name' => 'required',

        'code' => 'required',

    ];
   
    public function render()
    {   
        $this->languages = Language::select('id','name','code') ->get();
        return view('livewire.languages.languages');
    }
    
    public function resetFields(){
        $this->name ='';
        $this->code ='';
    }

    public function store(){
        $this->validate($this->rules);

        try{
           Language::create([
            'name' => $this->name,
            'code' => $this->code]
           );
           session()->flash('success','Good to go');
           $this->resetFields();

        }catch(\Exception $e){
            session()->flash('erro','something went wrong');
            $this->resetFields();
        }
    }
    public function update(){
        $this->validate($this->rules);
         try{
            Language::find($this->language_id)->fill([
             'name' => $this->name,
             'code' => $this->code]
            )->save();
            session()->flash('success','Good to go');
            $this->cancel();
 
         }catch(\Exception $e){
             session()->flash('erro','somthing went wrong');
             $this->cancel();
         }
     }
    public function cancel(){
        $this->updateLanguage = false;
        $this->resetFields();
    }
    public function edit($id){
     $language = Language::findOrFail($id);

     $this -> name = $language->name;
     $this -> code = $language->code;
     $this -> language_id = $language->id;
     $this->updateLanguage = true;
    }
}
