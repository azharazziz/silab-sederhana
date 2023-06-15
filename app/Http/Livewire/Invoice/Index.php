<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Order;
use Livewire\Component;

class Index extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = Order::find($this->orderId);
        return view('livewire.invoice.index', [
            'order' => $order
        ])
        ->layout('layouts.print');
    }
}
