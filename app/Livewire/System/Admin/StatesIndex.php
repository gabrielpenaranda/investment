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
        return view('livewire.system.admin.states-index');
    }
}
