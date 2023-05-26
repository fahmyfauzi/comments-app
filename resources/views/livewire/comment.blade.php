<div>
    <h3>({{ $total_coments }}) Comments</h3>
    @auth
        <form wire:submit.prevent='store' class="mb-4">
            <div class="mb-3">
                <textarea wire:model.defer='body' rows="2"
                    class="form-control @error('body')
                    is-invalid
                @enderror"
                    placeholder="Tulis Komentar..."></textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endauth

    @guest
        <div class="alert alert-primary" role="alert">
            Login dulu untuk berkomentar
            <a href="{{ route('login') }}">Klik disini</a>
        </div>
    @endguest


    @foreach ($comments as $item)
        <div class="mb-3" id="comment-{{ $item->id }}">
            <div class="d-flex align-items-start">

                <img src="https://img.icons8.com/?size=512&id=z-JBA_KtSkxG&format=png" alt="user"
                    class="img-fluid rounded-circle me-2 rounded" width="50px">
                <div>

                    <div>
                        <span>{{ $item->user->name }}, </span>
                        <span>{{ $item->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-secondary mb-2">
                        {{ $item->body }}
                    </div>
                    @auth
                        <div>
                            <button class="btn btn-sm btn-primary">Balas</button>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                            <button class="btn btn-sm btn-dark"><i class="bi bi-heart-fill"></i> (0)</button>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
        {{-- <div class="mb-3">
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
                    @auth
                        <div>
                            <button class="btn btn-sm btn-primary">Balas</button>
                            <button class="btn btn-sm btn-warning">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                            <button class="btn btn-sm btn-dark"><i class="bi bi-heart-fill"></i> (0)</button>
                        </div>
                    @endauth

                </div>
            </div>
        </div> --}}
        <hr>
    @endforeach
</div>
