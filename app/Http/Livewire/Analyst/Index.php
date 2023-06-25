<?php

namespace App\Http\Livewire\Analyst;

use App\Models\Analyst;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;
    public $analystId;
    Public $analystName;
    public $addNewAnalyst = false;
    public $newAnalystName;

    public function addNewAnalyst(){
        $this->addNewAnalyst = true;
    }

    public function cancelNewAnalyst(){
        $this->addNewAnalyst = false;
    }

    public function store(){
        $this->validate([
            'newAnalystName' => 'required',
        ]);
        Analyst::create([
            'analyst_name' => $this->newAnalystName,
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->addNewAnalyst = false;
    }

    public function showEditForm($analystId){
        $this->analystId = $analystId;
        $analyst = Analyst::find($analystId);
        $this->analystName = $analyst->name;
    }

    public function cancelEdit(){
        $this->analystId = null;
        $this->analystName = null;
    }

    public function update(){
        $this->validate([
            'analystName'   => 'required',
        ]);
        $analyst = Analyst::find($this->analystId);
        $analyst->name = $this->analystName;
        $analyst->save();
        $this->search = $analyst->name;
        session()->flash('success', 'Data berhasil diubah');
        $this->cancelEdit();
    }

    public function destroy($analystId){
        Analyst::find($analystId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        if($this->search != null){
            $analyst = Analyst::where('name', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $analyst = Analyst::orderBy('id', 'desc')->paginate(10);
        }
        return view('livewire.analyst.index',[
            'analyst' => $analyst,
        ]);
    }
}
