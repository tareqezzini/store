<div class="modal fade" id="update{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Order Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('update.orderStatus', '1245') }}">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="order_status" class="col-form-label">Order Status:</label>
                        <select class="form-control digits" id="order_status" name="order_status">
                            <option value="pending" @selected($order->status_order == 'pending')>pending</option>
                            <option value="process" @selected($order->status_order == 'process')>process</option>
                            <option value="delivered" @selected($order->status_order == 'delivered')>delivered</option>
                            <option value="cancelled" @selected($order->status_order == 'cancelled')>cancelled</option>
                        </select>
                        <input type="hidden" name="id" value="{{ $order->id }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
