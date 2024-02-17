<div class="container my-5">
    <div class="row my-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Search</h3>
                </div>
                <div class="card-body">
                    <form wire:submit="searchPage">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        wire:model.live="searchTerm">
                                </div>
                            </div>
                            <div class="col-6">

                                <button type="submit" class="btn btn-primary">
                                    <span wire:loading.remove wire:target="searchPage" aria-label="Search">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i> Search
                                    </span>
                                    <span wire:loading wire:target="searchPage" aria-label="Searching">
                                        Searching...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-6">
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::words($post->content, 25, '...') }}</p>
            </div>
        @empty
            <div class="col">
                <h3>No posts available</h3>
            </div>
        @endforelse
    </div>
    <div class="row">
        <div class="col">
            {{ $posts->links('pagination.client') }}
            {{-- {{ $posts->links('pagination.clientOriginalUrl') }} --}}
        </div>
    </div>
</div>
