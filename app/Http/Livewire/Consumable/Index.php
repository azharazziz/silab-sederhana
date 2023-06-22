<?php

namespace App\Http\Livewire\Consumable;

use App\Models\Consumable;
use Livewire\Component;

class Index extends Component
{

    public $consumableId;
    public $newIn;
    public $newOut;
    public $newExpired;
    public $newNotes;

    public function showEditForm($consumableId){
        $this->consumableId = $consumableId;
        $consumable = Consumable::find($consumableId);
        $this->newIn = $consumable->in;
        $this->newOut = $consumable->out;
        $this->newExpired = $consumable->expired;
        $this->newNotes = $consumable->notes;
    }

    public function update(){
        $consumable = Consumable::find($this->consumableId);
        $consumable->in = $this->newIn;
        $consumable->out = $this->newOut;
        $consumable->expired = $this->newExpired;
        $consumable->notes = $this->newNotes;
        $consumable->save();
        $this->cancelEdit();
        session()->flash('success', 'Data berhasil disimpan');

    }

    public function updatedNewIn(){
        if ($this->newIn == "")
        {
            $this->newIn = 0;
        }
    }

    public function updatedNewOut(){
        if ($this->newOut == "")
        {
            $this->newOut = 0;
        }
    }

    public function updatedNewExpired(){
        if ($this->newExpired == "")
        {
            $this->newExpired = 0;
        }
    }

    public function cancelEdit(){
        $this->consumableId = null;
    }

    public function render()
    {
        $consumable = Consumable::paginate(10);
        return view('livewire.consumable.index', [
            'consumables' => $consumable,
        ]);
    }
}
