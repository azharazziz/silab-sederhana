<?php

namespace App\Http\Livewire\Print;

use App\Models\Category;
use App\Models\Order;
use Livewire\Component;

class Barcode extends Component
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
        $category = Category::all();
        return view('livewire.print.barcode',[
            'order' => $order,
            'categories' => $category,
        ])
        ->layout('layouts.print');
    }
}
