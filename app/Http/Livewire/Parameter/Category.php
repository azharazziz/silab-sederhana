<?php

namespace App\Http\Livewire\Parameter;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{

    use WithPagination;
    public $search;
    public $categoryId;
    Public $categoryName;
    public $addNewCategory = false;
    public $newCategoryName;


    public function render()
    {
        if($this->search != null){
            $category = ModelsCategory::where('category_name', 'like', '%'. $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        } else {
            $category = ModelsCategory::orderBy('category_name', 'desc')->paginate(10);
        }
        return view('livewire.parameter.category',[
            'category' => $category,
        ]);
    }
}
