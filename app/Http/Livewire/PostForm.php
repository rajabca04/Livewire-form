<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Livewire\Component;

class PostForm extends Component
{   
    public $title;
    public $content;
    public $posts;

    public $rules = [
        'title' => 'required|min:10',
        'content' => 'required'
    ];
    
    public function save(){

        $data = $this->validate();

        Post::create($data);
        $this->title = $this->content = "";
        $this->posts = Post::all();

        session()->flash("msg","data insterted successfully..");

    }

    public function deletePost($id){

        $p = Post::find($id)->delete();
        session()->flash("ErrorMsg","record deleted successfully...");
        $this->posts = Post::all();

    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function mount(){
        $this->posts = Post::all();
    }


    public function render()
    {
        return view('livewire.post-form');
    }
}
