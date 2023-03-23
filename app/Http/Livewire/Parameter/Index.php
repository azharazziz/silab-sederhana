<?php

namespace App\Http\Livewire\Parameter;

use App\Models\Category;
use App\Models\Parameter;
use App\Models\ParameterOption;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $search;
    public $searchCategory;
    public $parameterId;
    Public $parameterName;
    public $addNewParameter;
    public $newParameterName;
    public $newCategoryId;
    public $newUnit;
    public $newReferenceValue;
    public $resultMethod;
    public $resultInputs = [];
    public $resultOption;
    public $i = 0;


    public function show(){
        dd($this->resultOption, $this->resultInputs);
    }

    public function addNewParameter(){
        $this->addNewParameter = true;
    }

    public function cancelNewParameter(){
        $this->addNewParameter = false;
        $this->newParameterName = null;
        $this->newCategoryId = null;
        $this->newUnit = null;
        $this->newReferenceValue = null;
        $this->resultMethod = null;
        $this->resultInputs = [];
        $this->resultOption = null;
        $this->i = 0;
    }

    public function addOption($i)
    {
        $i++;
        $this->i = $i;
        array_push($this->resultInputs ,$i);
        $this->resultOption[$i] = "";
    }

    public function removeOption($i)
    {   
        unset($this->resultOption[$this->resultInputs[$i]]);
        unset($this->resultInputs[$i]);
    }

    public function store(){
        $this->validate([
            'newParameterName' => 'required',
            'newCategoryId' => 'required',
            'resultMethod' => 'required',
            'resultOption.*' => 'required',
        ]);

        DB::transaction(function () {
            $parameter = Parameter::create([
                'category_id' => $this->newCategoryId,
                'parameter_name' => $this->newParameterName,
                'unit'  => $this->newUnit,
                'reference_value' => $this->newReferenceValue
            ]);

            if($this->resultMethod == 'option'){
                foreach ($this->resultOption as $key => $value) {
                    ParameterOption::create([
                        'parameter_id' => $parameter->id,
                        'option' => $this->resultOption[$key],
                    ]);
                }
            }

            session()->flash('success', 'Data berhasil ditambah');

            $this->cancelNewParameter();
        });
    }

    public function destroy($parameterId){
        Parameter::find($parameterId)->parameterOption()->delete();
        Parameter::find($parameterId)->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    }

    public function render()
    {
        $category = Category::all();

        if($this->search != null or $this->searchCategory != null){
            $parameter = Parameter::where('parameter_name', 'like', '%'. $this->search . '%')
            ->Where('category_id', 'like', '%' . $this->searchCategory . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $parameter = Parameter::orderBy('parameter_name', 'desc')->paginate(10);
;
        }
        return view('livewire.parameter.index',[
            'parameter' => $parameter,
            'categories' => $category,
        ]);
    }
}
