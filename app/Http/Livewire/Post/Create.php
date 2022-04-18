<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $content;

    public function store(){
        $this->validate([
            'title' => 'required',
            'content' => 'required',
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