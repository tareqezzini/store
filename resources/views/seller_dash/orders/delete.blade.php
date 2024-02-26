<!-- Modal -->
<div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this reccord?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('order.toTrash', '4125') }}">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
