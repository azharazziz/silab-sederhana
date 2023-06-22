<?php

namespace App\Http\Livewire\Handover;

use App\Models\Analyst;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $officer;
    public $receiver;

    public function handover($idOrder){
        $order = Order::find($idOrder);
        $order->delivery_officer = $this->officer[$idOrder]['value'];
        $order->receiver = $this->receiver[$idOrder]['value'];
        $order->save();
        $this->officer = null;
        $this->receiver = null;
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function cancelHandover($idOrder){
        $order = Order::find($idOrder);
        $order->delivery_officer = null;
        $order->receiver = null;
        $order->save();
        session()->flash('success', 'Data berhasil disimpan');


    }
    public function render()
    {
        $order = Order::where('release', 1)
        ->where('validate', 1)
        ->where('verify', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);

        $analyst = Analyst::all();
        return view('livewire.handover.index',[
            'order' => $order,
            'analysts' => $analyst,
        ]);
    }
}
