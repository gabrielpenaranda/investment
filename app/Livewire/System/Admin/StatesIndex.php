<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\State;

class StatesIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $direction = 'desc';
    public $sort = 'name';
    public $search;

    public function render()
    {
        $states = State::where('name', 'LIKE', '%'.$this->search.'%')->orderBy($this->sort, $this->direction)->paginate($this->pagination);
        return view('livewire.system.admin.states-index', compact('states'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

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
