@extends('layouts.app')

@push('styles')
    @livewireStyles()
@endpush

@push('scripts')
    @livewireScripts()
    <script>
        Livewire.on('comment_store', commentId => {
            var helloScroll = document.getElementById('comment-' + commentId);
            helloScroll.scrollIntoView({
                behavior: 'smooth'
            }, true);
        });
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $article->title }}
                </h2>
                <div>
                    <span>{{ $article->user->name }}, </span>
                    <span>{{ $article->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-secondary">
                    {{ $article->body }}
                </p>

                @livewire('comment', ['id' => $article->id])

            </div>
        </div>
    </div>
@endsection
