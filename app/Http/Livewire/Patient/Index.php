<?php

namespace App\Http\Livewire\Patient;

use App\Models\Analyst;
use App\Models\Category;
use App\Models\Clinician;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderParameter;
use App\Models\Parameter;
use App\Models\Patient;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Room;
use App\Models\Village;
use Livewire\Component;
use Livewire\WithPagination;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    use WithPagination;
    public $search;
    public $patientId;
    public $addNewPatient = false;
    public $newPatientName;
    public $newGender;
    public $newDateBirth;
    public $newProvince;
    public $newRegency;
    public $newDistrict;
    public $newVillage;
    public $newAddress;
    public $newPhone;
    public $newEmail;
    public $newClinician;
    public $newAnalyst;
    public $newRoom;
    public $newRegistrationDate;
    public $newExaminationDate;
    public $newParameter = [];
    public $newInsurance;


    public function addNewPatient(){
        $this->addNewPatient = true;
    }

    public function cancelNewPatient(){
        $this->addNewPatient = false;
    }

    public function reorder($patientId){
        $this->patientId = strval($patientId);
    }

    public function cancelReorder(){
        $this->patientId = null;
    }

    public function store(){
        $this->validate([
            'newPatientName'   => 'required',
            'newGender'   => 'required',
            'newDateBirth'    => 'required',
            'newProvince'   => 'required',
            'newRegency'   => 'required',
            'newDistrict'   => 'required',
            'newVillage'   => 'required',
            'newAddress'   => 'required',
        ]);

        DB::transaction(function () {
            // $id = UniqueIdGenerator::generate(['table' => 'patients', 'length' => 6]);
            $patient = Patient::create([
                'id' => UniqueIdGenerator::generate(['table' => 'patients', 'length' => 6], ),
                'name' => $this->newPatientName,
                'gender' => $this->newGender,
                'datebirth' => $this->newDateBirth,
                'province' => $this->newProvince,
                'regency' => $this->newRegency,
                'district' => $this->newDistrict,
                'village' => $this->newVillage,
                'address' => $this->newAddress,
                'phone' => $this->newPhone,
                'email' => $this->newEmail,
            ]);

            $this->order($patient->id);
        });
        session()->flash('success', 'Data berhasil disimpan');
        $this->addNewPatient = false;
    }

    public function order($patientId){
        $this->validate([
            'newClinician' => 'required',
            'newRoom'   => 'required',
            'newInsurance' => 'required',
        ]);

        DB::transaction(function () use($patientId) {
            $order = Order::create([
                'id' => UniqueIdGenerator::generate(['table' => 'orders', 'length' => 10, 'prefix' =>date('y'), 'reset_on_change'=>'prefix']),
                'patient_id' => $patientId,
                'clinician_id' => $this->newClinician,
                'analyst_id' => $this->newAnalyst,
                'room_id' => $this->newRoom,
                'registration_date' => $this->newRegistrationDate,
                'examination_date' => $this->newExaminationDate,
                'insurance' => $this->newInsurance,
                'paid_status' => 'Belum Bayar',
            ]);
            foreach ($this->newParameter as $parameter) {
                OrderParameter::create([
                    'order_id' => $order->id,
                    'parameter_id' => $parameter,
                    'price' => Parameter::find($parameter)->price,
                ]);
            }
        });
        // dd($patientId);

        session()->flash('success', 'Data berhasil disimpan');
        $this->cancelReorder();
    }

    public function destroy($patientId){
        Patient::find($patientId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        $patient = Patient::all();
        $clinician = Clinician::all();
        $room = Room::all();
        $province = Province::all();
        $category = Category::all();
        $analyst = Analyst::all();

        if($this->search != null){
            $patient = Patient::where('name', 'like', '%'. $this->search . '%')
            ->orWhere('id', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $patient = Patient::orderBy('name', 'desc')->paginate(10);
        }

        if($this->newProvince != null){
            $regency = Regency::Where('province_id', $this->newProvince)->get();
        } else {
            $regency = [];
        }

        if($this->newRegency != null){
            $district = District::Where('regency_id', $this->newRegency)->get();
        } else {
            $district = [];
        }

        if($this->newDistrict != null){
            $village = Village::Where('district_id', $this->newDistrict)->get();
        } else {
            $village = [];
        }

        return view('livewire.patient.index', [
            'patient' => $patient,
            'clinician' => $clinician,
            'province' => $province,
            'regency'  => $regency,
            'district' => $district,
            'village' => $village,
            'room' => $room,
            'category' => $category,
            'analyst' => $analyst
        ]);
    }
}
