<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use App\Models\system\AccountStatement;
use App\Models\system\Investment;
use Livewire\WithPagination;

class AccountStatementIndex extends Component
{
    use WithPagination;

    public $pagination = 5;
    public Investment $investment;

    public function mount(Investment $investment)
    {
        $this->investment = $investment;
    }
    
    public function render()
    {
        $account_statements = AccountStatement::where('investment_id', $this->investment->id)->paginate($this->pagination);
        return view('livewire.system.admin.account-statement-index', compact('account_statements'));
    }

    public function updatedPagination($value)
    {
        $this->resetPage();
    }
}
