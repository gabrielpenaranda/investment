<?php

namespace App\Livewire\System\Portal;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Tax;
use App\Models\User;

class TaxesIndex extends Component
{
    use WithPagination;

    public $pagination = 5;


    public function render()
    {
        $taxes = Tax::where('user_id', auth()->user()->id)
                    ->orderBy('year', 'desc')
                    ->paginate($this->pagination);
        
        return view('livewire.system.portal.taxes-index', compact('taxes'));
    }

    // Resetear página al cambiar perPage
    public function updatedPagination($value)
    {
        $this->resetPage();
    }
}
