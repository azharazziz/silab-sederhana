<?php

namespace App\Http\Livewire\Consumable;

use App\Models\Consumable;
use Livewire\Component;
use Livewire\WithPagination;

class Parameter extends Component
{
    use WithPagination;

    public $search;
    public $consumableId;
    Public $consumableName;
    public $addNewConsumable = false;
    public $newConsumableName;

    public function addNewConsumable(){
        $this->addNewConsumable = true;
    }

    public function cancelNewConsumable(){
        $this->addNewConsumable = false;
    }

    public function store(){
        $this->validate([
            'newConsumableName' => 'required',
        ]);
        Consumable::create([
            'consumable_name' => $this->newConsumableName,
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->addNewConsumable = false;
    }

    public function showEditForm($consumableId){
        $this->consumableId = $consumableId;
        $consumable = Consumable::find($consumableId);
        $this->consumableName = $consumable->name;
    }

    public function cancelEdit(){
        $this->consumableId = null;
        $this->consumableName = null;
    }

    public function update(){
        $this->validate([
            'consumableName'   => 'required',
        ]);
        $consumable = Consumable::find($this->consumableId);
        $consumable->name = $this->consumableName;
        $consumable->save();
        $this->search = $consumable->name;
        session()->flash('success', 'Data berhasil diubah');
        $this->cancelEdit();
    }

    public function destroy($consumableId){
        Consumable::find($consumableId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        if($this->search != null){
            $consumable = Consumable::where('name', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $consumable = Consumable::orderBy('id', 'desc')->paginate(10);
        }
        return view('livewire.consumable.parameter',[
            'consumable' => $consumable
        ]);
    }
}
