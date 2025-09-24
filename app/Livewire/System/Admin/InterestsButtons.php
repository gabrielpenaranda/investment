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
        $this->month = (int)now()->subMonth()->format('m'); // mes anterior

        if ($this->month == 12) {
            $this->year = (int)now()->year - 1;
        } else {
            $this->year = (int)now()->year;
        }
        // dd($this->month, $this->year);
    }

    public function render()
    {
        $interestMonth = InterestMonth::where('year', $this->year)
            ->where('month', $this->month)
            ->first();
        //dd($interestMonth);
        return view('livewire.system.admin.interests-buttons', compact('interestMonth'));
    }
}
