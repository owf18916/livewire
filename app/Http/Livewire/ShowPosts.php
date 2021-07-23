<?php

namespace App\Http\Livewire;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $comment;

    public function updated($comment)
    {
        $this->validateOnly($comment, [
            'comment' => 'required|max:191|min:3'
        ]);
    }

    public function add()
    {
        $this->validate([
            'comment' => 'required|max:191|min:3'
        ]);

        $comment = Comment::create([
            'user_id' => 1,
            'body' => $this->comment
        ]);

        $this->comment = '';

        $this->alert('success', 'Comment was added.', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true
        ]);
    }

    public $post_id;

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        
        $comment->delete();

        $this->post_id = '';

        $this->alert('success', 'Comment was deleted.', [
            'position' =>  'top-end', 
            'timer' =>  3000,  
            'toast' =>  true
        ]);
    }

    protected $listeners = ['confirmed'];

    public function confirmation($commentId)
    {
        $this->post_id = $commentId;

        $this->confirm('Are you sure ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed'
        ]);
    }

    public function confirmed()
    {
        $this->destroy($this->post_id);
    }

    public function render()
    {
        $comments = CommentResource::collection(Comment::latest()->paginate(5));
        return view('livewire.show-posts', compact('comments'));
    }
}
