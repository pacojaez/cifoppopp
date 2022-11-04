<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CategoriaIndex extends Component
{
    public $categories;


    public function mount(){
        $this->categories = Categoria::all();
    }
    public function render()
    {
        return view('livewire.categoria-index', [
            'categories' => $this->categories
        ]);
    }
}
