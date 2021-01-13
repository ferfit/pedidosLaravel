<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;


class ProductoIndex extends Component
{
    use WithPagination;

    public $category_id;

    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $categorias = Categoria::all();

        $productos = Producto::
                    category($this->category_id)
                    ->orderBy('id', 'desc')
                    ->paginate(7)
                    ;

        return view('livewire.producto-index', compact('categorias','productos'));
    }

    public function resetFilter(){
        $this->reset(['category_id']);
    }
}
