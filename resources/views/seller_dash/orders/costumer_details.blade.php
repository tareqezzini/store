<div class="modal fade" id="costumer{{ $order->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Costumer </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="price" class="col-md-2">Full Name</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text" value="{{ $order->user->full_name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">Email</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->email ? $order->email : $order->user->email }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">Phone</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->phone ? $order->phone : $order->user->phone }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">Address</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->address ? $order->address : $order->user->address }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">State</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->state ? $order->state : $order->user->state }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">City</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->city ? $order->city : $order->user->city }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2">Code Postal</label>
                    <div class=" col-md-10">
                        <input class="form-control" type="text"
                            value="{{ $order->code_postal ? $order->code_postal : $order->user->code_postal }}"
                            disabled>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
