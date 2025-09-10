<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Investment;
use App\Models\system\InvestmentArchive;


class InvestmentsIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $direction = 'desc';
    public $sort = 'name';
    public $search = '';
    public $is_active = 1;

    public function render()
    {   
        // dd($this->is_active);
        /* if ($this->is_active == 1) {
            $investments = Investment::where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->with('user')
                ->with('product')
                ->paginate($this->pagination);
                $archive = false;
        } else {
            $investments = InvestmentArchive::where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->pagination);
                $archive = true;
        } */

        /* $investments = Investment::where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->with('user')
                ->with('product')
                ->paginate($this->pagination); */

        // Convertir a booleano: '1' o 1 → true, '0' o 0 → false
        $isActive = filter_var($this->is_active, FILTER_VALIDATE_BOOLEAN);

        // Definir si estamos viendo "archivados" (inactivos)
        $archive = ! $isActive;

        // Construir consulta
        $query = Investment::query()->with('user', 'product');

        // 🔹 Filtrar por is_active
        $query->where('is_active', $isActive);

        // 🔹 Búsqueda en name o email (con agrupación para no romper el where)
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            });
        }

        // 🔹 Orden
        $query->orderBy($this->sort, $this->direction);

        // 🔹 Paginación
        $investments = $query->paginate($this->pagination);

        /* if ($this->is_active == 1) {
            $archive = false;
        } else {
            $archive = true;
        } */





       /*  $investments = $inv_non_filtered->filter(function ($change) {
            return $change->is_active ? true : false;
        }); */
        
        return view('livewire.system.admin.investments-index', compact('investments', 'archive'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Resetear página al cambiar perPage
    public function updatedPagination($value)
    {
        $this->resetPage();
    }

    public function order($algo)
    {
        if ($this->sort === $algo) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $algo;
            $this->direction = 'asc';
        }
    }
}
