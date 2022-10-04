<div class="modal fade @if ($show === true) show @endif"
    style="display: @if ($show === true) block
    @else
    none @endif;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" wire:click.prevent="doClose()" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center mt-3">
                Are you sure for delete this Blog?
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-danger" wire:click.prevent="deleteBlog()">Delete</button>
                <button type="button" class="btn btn-secondary" wire:click.prevent="doClose()">Cancle</button>
            </div>
        </div>
    </div>
</div>
