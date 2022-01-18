<footer class="footer bg-accent-light pt-5">
   <div class="container">
      <div class="row pb-2">
         <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
               <h3 class="widget-title text-light">{{ __('Popular categories') }}</h3>
               <ul class="widget-list">
                  @foreach ($popularCategories as $category)
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('categories.show', ['slug' => $category->slug]) }}">
                           {{ $category->name }}</a></li>
                  @endforeach
               </ul>
            </div>
         </div>
         <div class="col-md-4 col-sm-6">
            <div class="widget widget-links widget-light pb-2 mb-4">
               <h3 class="widget-title text-light">{{ __('Account') }}</h3>
               <ul class="widget-list">
                  @auth
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('cart.index') }}">{{ __('Cart') }}</a></li>
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('account.orders') }}">{{ __('Orders') }}</a></li>
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('account.profile') }}">{{ __('Profile') }}</a></li>
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('account.addresses') }}">{{ __('Addresses') }}</a></li>
                  @else
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('login') }}">{{ __('Login') }}</a></li>
                     <li class="widget-list-item"><a class="widget-list-link"
                           href="{{ route('register') }}">{{ __('Register') }}</a></li>
                  @endauth

               </ul>
            </div>
            <div class="widget widget-links widget-light pb-2 mb-4">
               <h3 class="widget-title text-light">{{ __('About us') }}</h3>
               <ul class="widget-list">
                  <li class="widget-list-item"><a class="widget-list-link"
                        href="{{ route('about') }}">{{ __('About us') }}</a></li>
                  <li class="widget-list-item"><a class="widget-list-link"
                        href="{{ route('contact.index') }}">{{ __('Contact us') }}</a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-4">
            <div class="widget pb-2 mb-4">
               <h3 class="widget-title text-light pb-1">{{ __('Stay informed') }}</h3>
               <form class="subscription-form validate"
                  action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126"
                  method="post"
                  name="mc-embedded-subscribe-form"
                  target="_blank"
                  novalidate>
                  <div class="input-group flex-nowrap"><i
                        class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                     <input class="form-control rounded-start"
                        type="email"
                        placeholder="{{ __('E-Mail Address') }}"
                        required>
                     <button class="btn btn-primary"
                        type="submit"
                        name="subscribe">{{ __('Subscribe') }}</button>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;"
                     aria-hidden="true">
                     <input class="subscription-form-antispam"
                        type="text"
                        name="b_c7103e2c981361a6639545bd5_29ca296126"
                        tabindex="-1">
                  </div>
                  <div class="form-text text-light opacity-50">
                     {{ __('Subscribe to our newsletter to receive early discount offers, updates and new products info') }}
                  </div>
                  <div class="subscription-status"></div>
               </form>
               <img class="d-inline-block mt-5"
                  src="/storage/theme/cards-alt.png"
                  width="387"
                  alt="Payment methods">
            </div>
         </div>
      </div>
   </div>
   <div class="pt-5 bg-accent">
      <div class="container">
         <div class="row pb-3">
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-rocket text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">
                        {{ __('Fast and free delivery in casablanca') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('Free delivery if you live in casablanca') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-currency-exchange text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">{{ __('Money back guarantee') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('We return money within 30 days') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-support text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">{{ __('Customer support') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('Friendly customer support for our clients') }}
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
               <div class="d-flex"><i class="ci-card text-primary"
                     style="font-size: 2.25rem;"></i>
                  <div class="ps-3">
                     <h6 class="fs-base text-light mb-1">
                        {{ __('Secure online payment with CMI') }}</h6>
                     <p class="mb-0 fs-ms text-light opacity-50">
                        {{ __('We possess SSL / Secure сertificate and use CMI gateway for great security') }}
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <hr class="hr-light mb-5">
         <div class="row pb-2">
            <div class="col-md-6 text-center text-md-start mb-4">
               <div class="text-nowrap mb-4"><a class="d-inline-block align-middle mt-n1 me-3"
                     href="#"><img class="d-block"
                        src="/storage/theme/footer-logo-light.png"
                        width="117"
                        alt="Cartzilla"></a>
               </div>
            </div>
            <div class="col-md-6 text-center text-md-end mb-4">
               <div class="mb-3"><a class="btn-social bs-light bs-twitter ms-2 mb-2"
                     href="#"><i class="ci-twitter"></i></a><a
                     class="btn-social bs-light bs-facebook ms-2 mb-2"
                     href="#"><i class="ci-facebook"></i></a><a
                     class="btn-social bs-light bs-instagram ms-2 mb-2"
                     href="#"><i class="ci-instagram"></i></a><a
                     class="btn-social bs-light bs-pinterest ms-2 mb-2"
                     href="#"><i class="ci-pinterest"></i></a><a
                     class="btn-social bs-light bs-youtube ms-2 mb-2"
                     href="#"><i class="ci-youtube"></i></a>
               </div>
            </div>
         </div>
         <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">©
            {{ __('All rights reserved') }}.
            {{ config('app.name') }}
         </div>
      </div>
   </div>
</footer>
