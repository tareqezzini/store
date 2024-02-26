<form wire:submit.prevent="addToWishlist" style="display: inline">
    @csrf
    @method('post')
    <input type="hidden" name="product_id" value="{{ $product_details->id }}">
    {!! $button !!}
</form>
