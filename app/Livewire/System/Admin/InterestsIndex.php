<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Interest;

class InterestsIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $direction = 'desc';
    public $sort = 'name';
    public $search;
    public $year;
    public $month;

    public function render()
    {
        $interests = Interest::where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('email', 'LIKE', '%'.$this->search.'%')
            ->where('year', $this->year)
            ->where('month', $this->month)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->pagination);
        return view('livewire.system.admin.interests-index', compact('interests'));
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