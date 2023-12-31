<?php

namespace App\Http\Livewire\Critical;

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
        $this->validate([
            'officer' => 'required',
            'receiver' => 'required',
        ]);
        $order = Order::find($idOrder);
        $order->reporter = $this->officer[$idOrder]['value'];
        $order->report_receiver = $this->receiver[$idOrder]['value'];
        $order->save();
        $this->officer = null;
        $this->receiver = null;
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function cancelHandover($idOrder){
        $order = Order::find($idOrder);
        $order->report_receiver = null;
        $order->reporter = null;
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
        return view('livewire.critical.index',[
            'order' => $order,
            'analysts' => $analyst,
        ]);
    }
}
