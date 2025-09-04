<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Investment;


class InvestmentsIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $direction = 'desc';
    public $sort = 'name';
    public $search;
    public $is_active = '1';

    public function render()
    {   
        // dd($this->is_active);
        if ($this->is_active == '1') {
            $investments = Investment::where('is_active', true)->get();
                -/* >where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->with('user')
                ->with('product')
                ->paginate($this->pagination); */

                // dd($investments);
        } else {
             $investments = Investment::where('is_active', false)->get();
                /* ->where('name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('email', 'LIKE', '%'.$this->search.'%')
                ->orderBy($this->sort, $this->direction)
                ->with('user')
                ->with('product')
                ->paginate($this->pagination); */
               // dd($investments);
        }

        return view('livewire.system.admin.investments-index', compact('investments'));
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
