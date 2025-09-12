<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Interest;
use App\Models\system\InterestMonth;
use Carbon\Carbon;

class InterestsIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $direction = 'desc';
    public $sort = 'name';
    public $search = '';
    public $year;
    public $month;

    // ✅ Inicializar con valores por defecto al montar
    public function mount()
    {
        /* $this->year = $this->year ?? now()->year;
        $this->month = $this->month ?? now()->month; */
        $this->year = (int)Carbon::now()->format('Y');
        $this->month = (int)Carbon::now()->subMonth()->format('m');
    }

    public function render()
    {
        // Construir consulta
        $query = Interest::query();

        // 🔹 Filtrar por año (solo si tiene valor)
        if ($this->year) {
            $query->where('year', $this->year);
        }

        // 🔹 Filtrar por mes (solo si tiene valor)
        if ($this->month) {
            $query->where('month', $this->month);
        }
        
        // 🔹 Búsqueda en name o email
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('email', 'LIKE', '%' . $this->search . '%');
            });
        }

        // 🔹 Orden
        $query->orderBy($this->sort, $this->direction);

        // 🔹 Paginación
        $interests = $query->paginate($this->pagination);

        $interest_month = InterestMonth::where('year', $this->year)->where('month', (int)Carbon::now()->subMonth()->format('m'))->first();
        //dd($interest_month);
        
        return view('livewire.system.admin.interests-index', compact('interests', 'interest_month' ));
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