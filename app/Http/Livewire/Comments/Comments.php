<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;
use App\Models\Proverb as Proverb;
use App\Models\ProverbComment as Comment;
use Illuminate\Support\Facades\Auth;

use App\Models\CommentReaction as CommentReaction;

class Comments extends Component
{   
    public $proverb, $proverb_id,$comment_description;

    protected $rules = [

        'comment_description' => 'required',

    ];

    public function mount($id){   
        $this->proverb_id = $id;
        $this->proverb = Proverb::findOrFail($id);
        return view('livewire.comments.comments');
    }

    public function saveComment($proverb_id){
        $this->validate($this->rules);
        try{
            Comment::create([
                'comment_description' => $this->comment_description,
                'user_id' => Auth::id(),
                'proverb_id' => $proverb_id,
            ]);
           $this->resetFields();

        }catch(\Exception $e){
            session()->flash('error','something went wrong');
            $this->resetFields();
        }

        $this->mount($this->proverb_id);
    }

    public function resetFields(){
        $this->comment_description ="";
    }

    public function likeComment($id){
        $likes = CommentReaction::where('user_id','=', Auth::id())
        ->where('proverb_comment_id','=', $id)->get();
        if(count($likes) >= 1){
            CommentReaction::where('user_id','=', Auth::id())
            ->where('proverb_comment_id','=', $id)->delete();
        }
        else{
            CommentReaction::create([
                'user_id' => Auth::id(),
                'proverb_comment_id' =>$id,
            ]);
        }

        $this->mount($this->proverb_id);
    }

}
