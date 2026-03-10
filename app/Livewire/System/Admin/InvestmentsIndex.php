<?php

namespace App\Livewire\System\Admin;

use App\Models\system\Investment;
use Livewire\Component;
use Livewire\WithPagination;

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
        $archive = (int) $this->is_active === 0;

        $query = Investment::query()->with('user', 'product');
        $query->where('is_active', (int) $this->is_active);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'LIKE', '%'.$this->search.'%')
                    ->orWhere('email', 'LIKE', '%'.$this->search.'%');
            });
        }

        $query->orderBy($this->sort, $this->direction);
        $investments = $query->paginate($this->pagination);

        return view('livewire.system.admin.investments-index', compact('investments', 'archive'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPagination($value)
    {
        $this->resetPage();
    }

    public function setActive($value)
    {
        $this->is_active = $value;
        $this->resetPage();
    }

    public function order($algo)
    {
        if ($this->sort === $algo) {
            $this->direction = $this->direction === 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort = $algo;
            $this->direction = 'asc';
        }
    }
}
