<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $content;

     public function updated($field)
    {
        $this->validateOnly($field, [
            'title'   => 'required|min:6',
            'content' => 'required|min:25',
        ]);
    }
    
    public function store(){
        $this->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:25',
        ]);
        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Berhasil Ditambah');
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}