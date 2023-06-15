<?php

namespace App\Http\Livewire\Analyze;

use App\Models\Order;
use App\Models\OrderParameter;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // public $search;
    public $orderId;
    public $result;

    // public function dd(){
    //     dd($this->result);
    // }

    public function release($orderId){
        $order = Order::find($orderId);
        $order->release = true;
        $order->save();
    }

    public function inputResult($orderId){
        $this->orderId = $orderId;
        $order = Order::find($orderId);
        foreach($order->orderParameter as $key => $value){
            $this->result[$value->id]['value'] = $value->result;
        }
    }

    public function cancelInput(){
        $this->orderId = null;
        $this->result = null;
    }

    public function store(){
        foreach ($this->result as $key => $value) {
            $orderParameter = OrderParameter::find($key);
            $orderParameter->result = $value['value'];
            $orderParameter->save();
        }
        $this->cancelInput();
    }

    public function render()
    {
        $order = Order::where('validate', 0)
        ->where('verify', 1)
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('livewire.analyze.index',[
            'order' => $order,
        ]);
    }
}
