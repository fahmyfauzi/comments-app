@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Articles</h1>
                @foreach ($articles as $item)
                    <a href="{{ route('articles.show', $item->slug) }}" class="text-primary h5">{{ $item->title }}</a>
                    <div>
                        <span>{{ $item->user->name }} ,</span>
                        <span>{{ $item->created_at->diffForHumans() }}, </span>
                        <span>(0) Comments</span>
                    </div>
                    <p class="text-secondary">
                        {{ $item->description }}
                    </p>
                @endforeach

            </div>
        </div>
    </div>
@endsection
