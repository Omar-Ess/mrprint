@props(['cart'])

<aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
   <div class="bg-white rounded-3 shadow-sm p-4 ms-lg-auto">
      <div class="py-2 px-xl-2">
         <div class="widget mb-3">
            <h2 class="widget-title text-center mb-4">{{ __('Order summary') }}</h2>
            @foreach ($cart->items as $cartItem)
               <div class="d-flex align-items-center pb-2 border-bottom py-3">
                  <a class="d-block flex-shrink-0"
                     href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">
                     <img src="{{ $cartItem->product->first_image }}"
                        width="64"
                        class="rounded-1 shadow-md"
                        alt="{{ $cartItem->product->title }}">
                  </a>
                  <div class="ps-2">
                     <h6 class="widget-product-title">
                        <a
                           href="{{ route('products.show', ['product' => $cartItem->product->slug]) }}">
                           {{ $cartItem->product->title }}
                        </a>
                     </h6>
                     <div class="widget-product-meta">
                        <span class="text-accent me-2">{{ $cartItem->subtotal }}<small>
                              Dhs</small>
                        </span>
                        <span class="text-muted">{{ $cartItem->quantity }}</span>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <ul class="list-unstyled fs-sm pb-2 border-bottom">
            <li class="d-flex justify-content-between align-items-center">
               <span class="me-2">{{ __('Subtotal') }}:
               </span>
               <span class="text-end">{{ $cart->subtotal }}<small> Dhs</small></span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
               <span class="me-2 text-success">{{ __('Discount') }}:
               </span>
               <span class="text-end text-success">{{ $cart->discount_price }}<small>
                     Dhs</small></span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
               <span class="me-2">{{ __('Delivery price') }}:
               </span>
               <span class="text-end">{{ (float) setting('cart.delivery_price') }}<small>
                     Dhs</small></span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
               <span class="me-2">{{ __('TVA') }}:
               </span>
               <span class="text-end">{{ $cart->getTaxPrice() }}<small> Dhs</small></span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
               <span class="me-2 h6">{{ __('Total') }}:
               </span>
               <span class="text-end h6">{{ $cart->getTotal() }}<small> Dhs</small></span>
            </li>
         </ul>
         <h3 class="fw-normal text-center my-4">{{ $cart->getTotal() }}<small> Dhs TTC</small>
         </h3>
      </div>
   </div>
   <div class="px-3">
      <div class="row pt-5 pb-3 px-3 bg-accent-light rounded-3 mt-4">
         <div class="mb-5">
            <div class="d-flex"><i class="ci-rocket text-primary"
                  style="font-size: 2.25rem;"></i>
               <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">
                     Livraison rapide et gratuite à casablanca</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">
                     Livraison gratuite si vous habitez à casablanca
                  </p>
               </div>
            </div>
         </div>
         <div class="mb-5">
            <div class="d-flex"><i class="ci-currency-exchange text-primary"
                  style="font-size: 2.25rem;"></i>
               <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Garantie de remboursement</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">
                     Nous retournons l'argent dans les 30 jours
                  </p>
               </div>
            </div>
         </div>
         <div class="mb-5">
            <div class="d-flex"><i class="ci-support text-primary"
                  style="font-size: 2.25rem;"></i>
               <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">Service client</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">
                     Support client amical pour nos clients
                  </p>
               </div>
            </div>
         </div>
         <div class="mb-5">
            <div class="d-flex"><i class="ci-card text-primary"
                  style="font-size: 2.25rem;"></i>
               <div class="ps-3">
                  <h6 class="fs-base text-light mb-1">
                     Paiement en ligne sécurisé avec CMI</h6>
                  <p class="mb-0 fs-ms text-light opacity-50">
                     Nous possédons un certificat SSL / Secure et utilisons la passerelle CMI pour une
                     grande sécurité
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</aside>
