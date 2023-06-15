<?php

namespace App\Http\Livewire\Checkout;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $order = Order::where('release', 1)
        ->where('validate', 1)
        ->where('verify', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('livewire.checkout.index',[
            'order' => $order
        ]);
    }
}
