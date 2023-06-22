<?php

namespace App\Http\Livewire\Billing;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $orderId;

    public function view($orderId){
        $this->orderId = $orderId;
    }

    public function paid(){
        $order = Order::find($this->orderId);
        $order->paid_status = 'Lunas';
        $order->save();
        $this->close();
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function insurance(){
        $order = Order::find($this->orderId);
        $order->paid_status = 'Jaminan';
        $order->save();
        $this->close();
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function close(){
        $this->orderId = null;
    }

    public function render()
    {
        $order = Order::orderBy('id', 'desc')
        ->paginate(10);
        return view('livewire.billing.index',[
            'order' => $order
        ]);
    }
}
