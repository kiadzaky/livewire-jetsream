<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.post.index',[
            'posts' => $this->search === null ?
                Post::latest()->paginate(10) :
                Post::latest()
                ->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('content', 'like', '%'.$this->search.'%')
                ->paginate(10)
        ]);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        if($post){
            $post->delete();
        }
        session()->flash('message', "data berhasil dihapus");

    return redirect()->route('post.index');
    }
    
}