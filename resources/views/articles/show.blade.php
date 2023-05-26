@extends('layouts.app')

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

                <h3>(0) Comments</h3>
                @foreach (range(1, 5) as $item)
                    <div class="mb-3">
                        <div class="d-flex align-items-start">

                            <img src="https://img.icons8.com/?size=512&id=z-JBA_KtSkxG&format=png" alt="user"
                                class="img-fluid rounded-circle me-2 rounded" width="50px">
                            <div>

                                <div>
                                    <span>alvianda</span>
                                    <span>23 Mei 2023</span>
                                </div>
                                <div class="text-secondary mb-2">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni, architecto.
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary">Balas</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                    <button class="btn btn-sm btn-dark"><i class="bi bi-heart-fill"></i> (0)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-start ms-4">

                            <img src="https://img.icons8.com/?size=512&id=z-JBA_KtSkxG&format=png" alt="user"
                                class="img-fluid rounded-circle me-2 rounded" width="50px">
                            <div>

                                <div>
                                    <span>alvianda</span>
                                    <span>23 Mei 2023</span>
                                </div>
                                <div class="text-secondary mb-2">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni, architecto.
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary">Balas</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                    <button class="btn btn-sm btn-dark"><i class="bi bi-heart-fill"></i> (0)</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>
        </div>
    </div>
@endsection
