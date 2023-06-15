<?php

namespace App\Http\Livewire\Print;

use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Index extends Component
{

    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $order = Order::find($this->orderId);
        if($order == null){
            return Redirect()->route('dashboard');
        }
    }

    public function render()
    {
        $order = Order::find($this->orderId);
        return view('livewire.print.index',[
            'order' => $order,
        ])
        ->layout('layouts.print');
    }
}
