<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form wire:submit.prevent="add">
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group me-3">
                            <input type="text" placeholder="What's in your mind ?" class="form-control" wire:model="comment">
                            @error('comment')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror                      
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary float-end" type="submit">Add</button>
                    </div>
                </div>
            </form>
            <div class="card rounded shadow mt-3">
                <div class="card-header">The Comments</div>
                @foreach($comments as $comment)
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>
                                <strong>{{ $comment->author->name }}</strong> <small class="text-secondary">{{ $comment->created_at->format('d F, Y') }}</small>
                            </p>
                            <p>{{ $comment->body }}</p>
                        </div>
                        <a wire:click="confirmation({{ $comment->id }})" role="button"><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <hr>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
