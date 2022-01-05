<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;

class Index extends Component
{
    protected $listeners = ['cartChanged' => 'render'];

    public function render()
    {
        return view('livewire.cart.index', [
            "cart" => Cart::where("user_id", auth()->id())->with(["items", "items.product"])->first()
        ]);
    }

    public function removeCartItem($cartItemId)
    {
        CartItem::destroy($cartItemId);

        $this->emit('cartChanged');
    }
}
