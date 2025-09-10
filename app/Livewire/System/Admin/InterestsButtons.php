<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use App\Models\system\InterestMonth;

class InterestsButtons extends Component
{
    public $year;
    public $month;

    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->subMonth()->format('m'); // mes anterior
    }

    public function render()
    {
        $interestMonth = InterestMonth::where('year', (string)$this->year)
            ->where('month', (string)$this->month)
            ->first();
        
            return view('livewire.system.admin.interests-buttons', compact('interestMonth'));
    }
}
