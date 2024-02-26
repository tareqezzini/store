 <!-- footer -->
 @if (App\Models\Settings::first())
     <footer class="footer-light">
         <section class="section-b-space light-layout">
             <div class="container">
                 <div class="row footer-theme partition-f">
                     <div class="col-lg-4 col-md-6">
                         <div class="footer-title footer-mobile-title">
                             <h4>about</h4>
                         </div>
                         <div class="footer-contant">
                             <div class="footer-logo">
                                 <a href="/">
                                     @if (App\Models\Settings::first())
                                         @if (App\Models\Settings::first()->logo)
                                             <img src="{{ asset('images/Logo/' . App\Models\Settings::first()->logo) }}"
                                                 class="img-fluid blur-up lazyload" alt="logo">
                                         @else
                                             <h2>Logo</h2>
                                         @endif
                                     @endif
                                 </a>
                             </div>
                             <p>{{ App\Models\Settings::first()->description }}</p>
                             <div class="footer-social">
                                 <ul>
                                     <li><a href="{{ App\Models\Settings::first()->facebook }}"><i
                                                 class="fa fa-facebook-f"></i></a></li>
                                     <li><a href="{{ App\Models\Settings::first()->instagram }}"><i
                                                 class="fa fa-instagram"></i></a></li>
                                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col offset-xl-1">
                         <div class="sub-title">
                             <div class="footer-title">
                                 <h4>my categoreis</h4>
                             </div>
                             <div class="footer-contant">
                                 <ul>
                                     @foreach (App\Models\Category::where('is_parent', 1)->limit(5)->get() as $cat)
                                         <li><a
                                                 href="{{ route('product_category', $cat->slug) }}">{{ $cat->title }}</a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="sub-title">
                             <div class="footer-title">
                                 <h4>why we choose</h4>
                             </div>
                             <div class="footer-contant">
                                 <ul>
                                     <li><a href="#">shipping & return</a></li>
                                     <li><a href="#">secure shopping</a></li>
                                     <li><a href="#">gallary</a></li>
                                     <li><a href="#">affiliates</a></li>
                                     <li><a href="#">contacts</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col">
                         <div class="sub-title">
                             <div class="footer-title">
                                 <h4>store information</h4>
                             </div>
                             <div class="footer-contant">
                                 <ul class="contact-list">
                                     <li><i class="fa fa-map-marker"></i>{{ App\Models\Settings::first()->address }}
                                     </li>
                                     <li><i class="fa fa-phone"></i>Call Us: {{ App\Models\Settings::first()->phone }}
                                     </li>
                                     <li><i class="fa fa-envelope"></i>Email Us: <a
                                             href="#">{{ App\Models\Settings::first()->email }}</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <div class="sub-footer">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-6 col-md-6 col-sm-12">
                         <div class="footer-end">
                             <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023
                                 {{ App\Models\Settings::first()->name_app }} </p>
                         </div>
                     </div>
                     <div class="col-xl-6 col-md-6 col-sm-12">
                         <div class="payment-card-bottom">
                             <ul>
                                 <li>
                                     <a href="#"><img src="{{ asset('frontend/assets/images/icon/visa.png') }}"
                                             alt=""></a>
                                 </li>
                                 <li>
                                     <a href="#"><img
                                             src="{{ asset('frontend/assets/images/icon/mastercard.png') }}"
                                             alt=""></a>
                                 </li>
                                 <li>
                                     <a href="#"><img src="{{ asset('frontend/assets/images/icon/paypal.png') }}"
                                             alt=""></a>
                                 </li>
                                 <li>
                                     <a href="#"><img
                                             src="{{ asset('frontend/assets/images/icon/american-express.png') }}"
                                             alt=""></a>
                                 </li>
                                 <li>
                                     <a href="#"><img
                                             src="{{ asset('frontend/assets/images/icon/discover.png') }}"
                                             alt=""></a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
 @endif
