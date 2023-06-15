<?php

namespace App\Http\Livewire\Parameter;

use App\Models\Category;
use App\Models\Parameter;
use App\Models\ParameterOption;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public $searchCategory;
    public $parameterId;
    public $addNewParameter;
    public $newParameterName;
    public $newCategoryId;
    public $newUnit;
    public $newReferenceValue;
    public $resultMethod;
    public $resultInputs = [];
    public $resultOption;
    public $deletedResultOption;
    public $newPrice;
    public $newTop;
    public $newBottom;
    public $i = 0;

    public function showEditForm($parameterId){
        $i = 0;

        $this->parameterId = $parameterId;
        $parameter = Parameter::find($parameterId);
        $this->newParameterName = $parameter->parameter_name;
        $this->newCategoryId = $parameter->category_id;
        if ($parameter->parameterOption->count() > 0) {
            $this->resultMethod = 'option';
            foreach($parameter->parameterOption as $item){
                $i++;
                $this->i = $i;
                array_push($this->resultInputs ,$i);
                $this->resultOption[$i]['id'] = $item->id;
                $this->resultOption[$i]['option'] = $item->option;
            }
        } else {
            $this->resultMethod = 'direct';
        }
        $this->newUnit = $parameter->unit;
        $this->newReferenceValue = $parameter->reference_value;
        $this->newPrice = $parameter->price;
        $this->newTop = $parameter->top;
        $this->newBottom = $parameter->bottom;
    }

    public function cancelEdit(){
        $this->parameterId = null;
        $this->cancelNewParameter();
    }

    public function update(){
        $this->validate([
            'newParameterName' => 'required',
            'newCategoryId' => 'required',
            'resultMethod' => 'required',
            'resultOption.*' => 'required',
            'newPrice'  => 'required|numeric|min:3',
            'newTop' => 'nullable|numeric',
            'newBottom' => 'nullable|numeric',
        ]);
        DB::transaction(function () {
            $parameter = Parameter::find($this->parameterId);
            $parameter->parameter_name = $this->newParameterName;
            $parameter->unit = $this->newUnit;
            $parameter->category_id = $this->newCategoryId;
            $parameter->reference_value = $this->newReferenceValue;
            $parameter->price = $this->newPrice;
            $parameter->top = $this->newTop;
            $parameter->bottom = $this->newBottom;
            $parameter->save();

            if($this->resultMethod == 'option'){
                foreach ($this->resultOption as $key => $value) {
                    if (array_key_exists('id', $this->resultOption[$key])) {
                        $parameterOption = ParameterOption::find($this->resultOption[$key]['id']);
                        $parameterOption->option = $this->resultOption[$key]['option'];
                        $parameterOption->save();

                    } else {
                        ParameterOption::create([
                            'parameter_id' => $parameter->id,
                            'option' => $this->resultOption[$key]['option'],
                        ]);
                    }
                }

                if ($this->deletedResultOption != null) {
                    foreach($this->deletedResultOption as $key => $value) {
                        ParameterOption::find( $this->deletedResultOption[$key]['id'] )->delete();
                    }
                }
            }
            $this->deletedResultOption = null;
            $this->cancelEdit();
            $this->cancelNewParameter();
        });


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
        $this->newPrice = null;
        $this->i = 0;
    }

    public function addOption($i)
    {
        $i++;
        $this->i = $i;
        array_push($this->resultInputs ,$i);
        $this->resultOption[$i]['option'] = "";
    }

    public function removeOption($i)
    {
        $this->deletedResultOption[] = $this->resultOption[$this->resultInputs[$i]];
        unset($this->resultOption[$this->resultInputs[$i]]);
        unset($this->resultInputs[$i]);
    }

    public function store(){
        $this->validate([
            'newParameterName' => 'required',
            'newCategoryId' => 'required',
            'resultMethod' => 'required',
            'resultOption.*' => 'required',
            'newPrice'  => 'required|numeric|min:2',
            'newTop' => 'nullable|numeric',
            'newBottom' => 'nullable|numeric',
        ]);

        DB::transaction(function () {
            $parameter = Parameter::create([
                'category_id' => $this->newCategoryId,
                'parameter_name' => $this->newParameterName,
                'unit'  => $this->newUnit,
                'reference_value' => $this->newReferenceValue,
                'price' => $this->newPrice,
                'top' => $this->newTop,
                'bottom' => $this->newBottom,
            ]);

            if($this->resultMethod == 'option'){
                foreach ($this->resultOption as $key => $value) {
                    ParameterOption::create([
                        'parameter_id' => $parameter->id,
                        'option' => $this->resultOption[$key]['option'],
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
            ->when($this->searchCategory != null, function ($query){
                return $query->Where('category_id', $this->searchCategory);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $parameter = Parameter::orderBy('id', 'desc')->paginate(10);
;
        }
        return view('livewire.parameter.index',[
            'parameter' => $parameter,
            'categories' => $category,
        ]);
    }
}
