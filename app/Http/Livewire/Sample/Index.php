<?php

namespace App\Http\Livewire\Sample;

use App\Models\Order;
use App\Models\Sample;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;
    public $orderId;
    // public $order;
    public $sampleId;
    Public $sampleName;
    public $addNewSample = false;
    // public $newSampleName;
    public $newStorageType = [];
    public $sample;
    public $noteOrder;


    public function showEditForm($orderId){
        $this->orderId = $orderId;
        $order = Order::find($orderId);
        foreach($order->sample as $key => $value){
            $this->sample[$value->id]['volume'] = $value->volume;
            $this->sample[$value->id]['note'] = $value->note;
        }
        $this->noteOrder = $order->note;
    }

    public function saveSample(){
        foreach ($this->sample as $key => $value) {
            $sample = Sample::find($key);
            $sample->volume = $value['volume'];
            $sample->note = $value['note'];
            $sample->save();

        }
    }

    public function verify($orderId){
        @$this->saveSample();
        $order = Order::find($orderId);
        $order->note = $this->noteOrder;
        $order->verify = 1;
        $order->verify_date = now();
        $order->save();
        $this->cancelEdit();
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function reject($orderId){
        $order = Order::find($orderId);
        $order->verify = 0;
        $order->note = $this->noteOrder;
        $order->save();
        $this->cancelEdit();
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function cancelEdit(){
        $this->orderId = null;
        $this->newStorageType = [];
        $this->noteOrder = null;
    }

    public function addStorage(){
        foreach($this->newStorageType as $sample) {
            if(Sample::where([
                ['order_id', $this->orderId],
                ['type', $sample],
            ])->exists()
            ){
            }else{
                Sample::create([
                    'order_id' => $this->orderId,
                    'type' => $sample,
                ]);
            }
        }
    }

    public function deleteStorage($sampleId){
        Sample::find($sampleId)->delete();
        unset($this->sample[$sampleId]);
    }

    public function render()
    {
        if($this->search != null){
            $order = Order::where('id', 'like', '%'. $this->search . '%')
            ->where('validate', 0)
            ->where('release', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $order = Order::where('validate', 0)
            ->where('release', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
        }
        return view('livewire.sample.index',[
            'order' => $order,
        ]);
    }
}
