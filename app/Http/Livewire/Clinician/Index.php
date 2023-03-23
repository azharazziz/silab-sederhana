<?php

namespace App\Http\Livewire\Clinician;

use App\Models\Clinician;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;
    public $clinicianId;
    Public $doctorName;
    public $addNewDoctor = false;
    public $newDoctorName;

    public function addNewDoctor(){
        $this->addNewDoctor = true;
    }

    public function cancelNewDoctor(){
        $this->addNewDoctor = false;
    }

    public function store(){
        $this->validate([
            'newDoctorName' => 'required',
        ]);
        Clinician::create([
            'doctor_name' => $this->newDoctorName,
        ]);
        session()->flash('success', 'Data berhasil disimpan');
        $this->addNewDoctor = false;
    }

    public function showEditForm($clinicianId){
        $this->clinicianId = $clinicianId;
        $clinician = Clinician::find($clinicianId);
        $this->doctorName = $clinician->doctor_name;
    }

    public function cancelEdit(){
        $this->clinicianId = null;
        $this->doctorName = null;
    }

    public function update(){
        $this->validate([
            'doctorName'   => 'required',
        ]);
        $clinician = Clinician::find($this->clinicianId);
        $clinician->doctor_name = $this->doctorName;
        $clinician->save();
        $this->search = $clinician->doctor_name;
        session()->flash('success', 'Data berhasil diubah');
        $this->cancelEdit();
    }
    
    public function destroy($clinicianId){
        Clinician::find($clinicianId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        if($this->search != null){
            $clinician = Clinician::where('doctor_name', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $clinician = Clinician::orderBy('id', 'desc')->paginate(10);
        }
        return view('livewire.clinician.index',[
            'clinician' => $clinician,
        ]);
    }

}
