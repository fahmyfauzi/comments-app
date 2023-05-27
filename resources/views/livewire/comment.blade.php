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

                            <button class="btn btn-sm btn-primary"
                                wire:click='selectReply({{ $item->id }})'>Balas</button>
                            @if ($item->user->id == Auth::user()->id)
                                <button class="btn btn-sm btn-warning"
                                    wire:click="selectEdit({{ $item->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click='selectDelete({{ $item->id }})'>Hapus</button>
                            @endif
                            @if ($item->hasLike)
                                <button class="btn btn-sm btn-danger" wire:click='Like({{ $item->id }})'><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $item->total_likes() }}</button>
                            @else
                                <button class="btn btn-sm btn-dark" wire:click='Like({{ $item->id }})'><i
                                        class="bi bi-heart-fill"></i>
                                    {{ $item->total_likes() }}</button>
                            @endif
                        </div>
                    @endauth
                </div>

            </div>

            <div class="ms-4">
                {{-- Balas Comment --}}
                @if (isset($comment_id) && $comment_id == $item->id)
                    <form wire:submit.prevent='reply' class="my-4">
                        <div class="mb-3">
                            <textarea wire:model.defer='body2' rows="2" class="form-control @error('body2') is-invalid @enderror"
                                placeholder="Tulis Komentar..."></textarea>
                            @error('body2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                @endif
                {{-- Edit Comment --}}
                @if (isset($edit_comment_id) && $edit_comment_id == $item->id)
                    <form wire:submit.prevent='change' class="my-4">
                        <div class="mb-3">
                            <textarea wire:model.defer='body2' rows="2" class="form-control @error('body2') is-invalid @enderror"
                                placeholder="Tulis Komentar..."></textarea>
                            @error('body2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">update</button>
                        </div>
                    </form>
                @endif
            </div>

        </div>

        {{-- comment balasa --}}
        @if ($item->children)
            @foreach ($item->children as $item2)
                <div class="mb-3">
                    <div class="d-flex align-items-start ms-4">

                        <img src="https://img.icons8.com/?size=512&id=z-JBA_KtSkxG&format=png" alt="user"
                            class="img-fluid rounded-circle me-2 rounded" width="50px">
                        <div>

                            <div>
                                <span>{{ $item2->user->name }}</span>
                                <span>{{ $item2->created_at }}</span>
                            </div>
                            <div class="text-secondary mb-2">
                                {{ $item2->body }}
                            </div>
                            @auth
                                <div>

                                    <button class="btn btn-sm btn-primary"
                                        wire:click='selectReply({{ $item2->id }})'>Balas</button>
                                    @if ($item2->user->id == Auth::user()->id)
                                        <button class="btn btn-sm btn-warning"
                                            wire:click="selectEdit({{ $item2->id }})">Edit</button>
                                        <button class="btn btn-sm btn-danger"
                                            wire:click='selectDelete({{ $item2->id }})'>Hapus</button>
                                    @endif
                                    @if ($item2->hasLike)
                                        <button class="btn btn-sm btn-danger" wire:click='Like({{ $item2->id }})'><i
                                                class="bi bi-heart-fill"></i>
                                            {{ $item2->total_likes() }}</button>
                                    @else
                                        <button class="btn btn-sm btn-dark" wire:click='Like({{ $item2->id }})'><i
                                                class="bi bi-heart-fill"></i>
                                            {{ $item2->total_likes() }}</button>
                                    @endif
                                </div>
                            @endauth

                        </div>
                        <div class="ms-4">
                            {{-- Balas Comment --}}
                            @if (isset($comment_id) && $comment_id == $item2->id)
                                <form wire:submit.prevent='reply' class="my-4">
                                    <div class="mb-3">
                                        <textarea wire:model.defer='body2' rows="2" class="form-control @error('body2') is-invalid @enderror"
                                            placeholder="Tulis Komentar..."></textarea>
                                        @error('body2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Edit Comment --}}
                            @if (isset($edit_comment_id) && $edit_comment_id == $item2->id)
                                <form wire:submit.prevent='change' class="my-4">
                                    <div class="mb-3">
                                        <textarea wire:model.defer='body2' rows="2" class="form-control @error('body2') is-invalid @enderror"
                                            placeholder="Tulis Komentar..."></textarea>
                                        @error('body2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-warning">update</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <hr>
    @endforeach
</div>
