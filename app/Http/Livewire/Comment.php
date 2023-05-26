<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    public $body, $article;

    public function mount($id)
    {
        $this->article = Article::find($id);
    }

    public function render()
    {
        return view('livewire.comment', [
            'comments' => ModelsComment::with('user')->where('article_id', $this->article->id)->get(),
            'total_coments' => ModelsComment::with('user')->where('article_id', $this->article->id)->count()
        ]);
    }

    public function store()
    {
        $this->validate(['body' => 'required']);

        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $this->article->id,
            'body' => $this->body
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body = null;
        } else {
            session()->flash('danger', 'Komentar gagal dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }
}
