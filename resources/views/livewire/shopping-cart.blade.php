 <div class="container">
     <div class="row">

         <div class="col-sm-12 table-responsive-xs">

             <table class="table cart-table">
                 <thead>
                     <tr class="table-head">
                         <th scope="col">image</th>
                         <th scope="col">product name</th>
                         <th scope="col">price</th>
                         <th scope="col">quantity</th>
                         <th scope="col">action</th>
                         <th scope="col">total</th>
                     </tr>
                 </thead>
                 @foreach ($carts as $cart)
                     <tbody>
                         <tr>
                             <td>
                                 <a href="#"><img src="{{ asset('images/Products/' . $cart->attributes->image) }}"
                                         alt=""></a>
                             </td>
                             <td><a href="#">{{ $cart->name }}</a>
                                 <div class="mobile-cart-content row">
                                     <div class="col">
                                         <div class="qty-box">
                                             <div class="input-group">
                                                 <button wire:click="decrementQty({{ $cart->id }})"
                                                     class="text-black px-2 mx-1 font-weight-bold"
                                                     style="font-size: 22px">-</button>
                                                 <input type="text" value="{{ $cart->quantity }}" disabled
                                                     name="quantity" class="form-control input-number">
                                                 <button type="button" wire:click="incrementQty({{ $cart->id }})"
                                                     class="text-black px-2 mx-1  font-weight-bold"
                                                     style="font-size: 22px">+</button>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col">
                                         <h2 class="td-color">${{ $cart->price }}</h2>
                                     </div>
                                     <div class="col">
                                         <button class="td-color border-0 bg-white"
                                             wire:click="removeFromCart({{ $cart->id }})">
                                             <i class="ti-close"></i>
                                         </button>
                                     </div>
                                 </div>
                             </td>
                             <td>
                                 <h2>${{ $cart->price }}</h2>
                             </td>
                             <td>
                                 <div class="qty-box">
                                     <div class="input-group">
                                         <button wire:click="decrementQty({{ $cart->id }})"
                                             class="text-black px-2 mx-1 font-weight-bold"
                                             style="font-size: 22px">-</button>
                                         <input type="text" value="{{ $cart->quantity }}" disabled name="quantity"
                                             class="form-control input-number">
                                         <button type="button" wire:click="incrementQty({{ $cart->id }})"
                                             class="text-black px-2 mx-1  font-weight-bold"
                                             style="font-size: 22px">+</button>
                                     </div>

                                 </div>
                             </td>
                             <td>
                                 <button class="td-color border-0 bg-white"
                                     wire:click="removeFromCart({{ $cart->id }})">
                                     <i class="ti-close"></i>
                                 </button>
                             </td>
                             <td>
                                 <h2 class="td-color">${{ $cart->price * $cart->quantity }}</h2>
                             </td>
                         </tr>
                     </tbody>
                 @endforeach

             </table>
             <div class="table-responsive-md">
                 <table class="table cart-table ">
                     <tfoot>
                         <tr>
                             <td>total price :</td>
                             <td>
                                 <h2>$
                                     {{ number_format(Cart::session('cart')->getSubTotal(), 2) }}
                                 </h2>
                             </td>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </div>
     </div>
     <div class="row cart-buttons">
         <div class="col-6"><a href="#" class="btn btn-solid">continue shopping</a></div>
         <div class="col-6"><a href="{{ route('checkout.index') }}" class="btn btn-solid">check out</a></div>
     </div>
 </div>
