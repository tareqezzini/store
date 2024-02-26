<form wire:submit.prevent="addToCart" style="display: inline">
    @csrf
    @method('post')
    <input type="hidden" name="product_id" value="{{ $product_details->id }}">
    {{-- <button type="submit" class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1"
            aria-hidden="true"></i> add to cart</button> --}}
    {!! $button !!}
</form>
