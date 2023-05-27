<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as ModelsComment;

class Comment extends Component
{
    public $body, $body2, $article;
    public $edit_comment_id, $comment_id;

    public function mount($id)
    {
        $this->article = Article::find($id);
    }

    public function render()
    {
        return view('livewire.comment', [
            'comments' => ModelsComment::with(['user', 'children'])->where('article_id', $this->article->id)->whereNull('comment_id')->get(),
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

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->comment_id = null;
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id = NULL;
        $this->body2 = null;
    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::find($this->comment_id);

        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'article_id' => $this->article->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->body2 = null;
            $this->comment_id = null;
        } else {
            session()->flash('danger', 'Komentar gagal dibuat');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }

    public function change()
    {
        $this->validate(['body2' => 'required']);

        $comment = ModelsComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2
        ]);

        if ($comment) {
            $this->emit('comment_store', $this->edit_comment_id);
            $this->body = null;
            $this->edit_comment_id = NULL;
        } else {
            session()->flash('danger', 'Komentar gagal update');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }

    public function selectDelete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return null;
        } else {
            session()->flash('danger', 'Komentar gagal dihapus');
            return redirect()->route('articles.show', $this->article->slug);
        }
    }
}
