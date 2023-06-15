<?php

namespace App\Http\Livewire\Validate;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $orderId;

    public function detail($orderId){
        $this->orderId = $orderId;
    }

    public function validating($orderId){
        $order = Order::find($orderId);
        $order->validate = true;
        $order->save();
        $this->cancelDetail();
    }

    public function recheck($orderId){
        $order = Order::find($orderId);
        $order->validate = false;
        $order->save();
        $this->cancelDetail();
    }

    public function cancelDetail(){
        $this->orderId = null;
    }

    public function render()
    {
        $order = Order::where('release', 1)
        ->where('verify', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('livewire.validate.index',[
            'order' => $order,
        ]);
    }
}
