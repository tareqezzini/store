<li class="onhover-div mobile-cart">
    <div><img src="{{ asset('frontend/assets/images/icon/cart.png') }}" class="img-fluid blur-up lazyload" alt="">
        <i class="ti-shopping-cart"></i>
    </div>



    @if (!Cart::session('cart')->isEmpty())
        <span class="cart_qty_cls">
            {{ Cart::session('cart')->getTotalQuantity() }}
        </span>
        <ul class="show-div shopping-cart">

            @foreach ($items = \Cart::session('cart')->getContent() as $prodcut_cart)
                <li>
                    <div class="media">
                        <a href="#"><img alt="product image" class="me-3"
                                src="{{ asset('images/Products/' . $prodcut_cart->attributes->image) }}"></a>
                        <div class="media-body">
                            <a href="{{ route('product.details', $prodcut_cart->attributes->slug) }}">
                                <h4>{{ $prodcut_cart->name }}</h4>
                            </a>
                            <h4><span>{{ $prodcut_cart->quantity }} x $
                                    {{ number_format($prodcut_cart->price, 2) }}</span>
                            </h4>
                        </div>
                    </div>
                    <div class="close-circle">
                        <a wire:click="removeFromCart('{{ $prodcut_cart->id }}')">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </li>
            @endforeach

            <li>
                <div class="total">
                    <h5>subtotal :
                        <span>${{ number_format(Cart::session('cart')->getSubTotal(), 2) }}</span>
                    </h5>
                </div>
            </li>
            <li>
                <div class="buttons"><a href="{{ route('cart.show') }}" class="view-cart">view
                        cart</a> <a href="{{ route('checkout.index') }}" class="checkout">checkout</a>
                </div>
            </li>
        </ul>
    @endif

</li>
