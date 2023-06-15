<?php

namespace App\Http\Livewire\Search;

use App\Models\Order;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $orderId;
    public $searchMedicalRecord;
    public $searchLabLot;
    public $searchName;

    public function view($orderId){
        $this->orderId = $orderId;
    }

    public function close(){
        $this->orderId = null;
    }

    public function render()
    {
        if ($this->searchMedicalRecord != null || $this->searchLabLot != null || $this->searchName != null) {
            if( $this->searchName != null){
                $patient = Patient::where('name', 'like', '%'.$this->searchName.'%')->get();
                $idPatient = null;
                foreach ($patient as $item) {
                    $idPatient[] = $item->id;
                }
                // dd($idPatient);
                // DB::enableQueryLog();
                $order = Order::where([
                    ['release', 1],
                    ['validate', 1],
                    ['verify', 1],
                    ])
                    ->WhereIn(
                        'patient_id', $idPatient
                    )
                    ->orderBy('id', 'desc')
                    ->paginate(10);
                    // dd(DB::getQueryLog());
            } else {
            $order = Order::where([
                    ['release', 1],
                    ['validate', 1],
                    ['verify', 1],
                    ['patient_id', 'like', '%'.$this->searchMedicalRecord.'%'],
                    ['id', 'like', '%'.$this->searchLabLot.'%'],
                    ])
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }
        } else {
            $order = Order::where('release', 1)
                    ->where('validate', 1)
                    ->where('verify', 1)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        }
        return view('livewire.search.index',[
            'order' => $order
        ]);
    }
}
