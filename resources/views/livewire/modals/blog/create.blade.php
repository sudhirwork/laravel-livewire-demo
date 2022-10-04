<div class="modal fade @if ($show === true) show @endif"
    style="display: @if ($show === true) block
    @else
    none @endif;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBlogLabel">Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click.prevent="doClose()"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-2">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title"
                            wire:model="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="feature_image">Image:</label>
                        <input type="file" class="form-control" id="feature_image" placeholder="Upload Image"
                            wire:model="feature_image">
                        @error('feature_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Description:</label>
                        <textarea type="text" class="form-control" id="description" wire:model="description" placeholder="Enter description"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer mt-3">
                <button wire:click.prevent="addBlog()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
