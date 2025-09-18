<?php

namespace App\Livewire\System\Portal;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Investment;


class InvestmentsIndex extends Component
{
    use WithPagination;

    public $pagination = 5;

    public function render()
    {   
        $investments = Investment::where('user_id', auth()->user()->id)->paginate($this->pagination);

        return view('livewire.system.portal.investments-index', compact('investments'));
    }

    // Resetear página al cambiar perPage
    public function updatedPagination($value)
    {
        $this->resetPage();
    }
}
