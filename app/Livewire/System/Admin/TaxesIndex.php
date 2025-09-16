<?php

namespace App\Livewire\System\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\system\Tax;
use App\Models\User;

class TaxesIndex extends Component
{
    use WithPagination;

    public $user = null; // ← ¡Importante! Debe ser el ID del usuario, no el modelo ni la colección.
    public $search = '';
    public $pagination = 5;

    public function render()
    {
        // Obtener lista de usuarios para el select
        $users = User::where('type', '!=', 'Admin')->get(); // o User::orderBy('name')->get();

        // Filtrar los registros de Tax según el usuario seleccionado
        /* $taxes = Tax::query();

        if ($this->user) {
            $taxes->where('user_id', $this->user); // ← Aquí usas $this->user como ID
        } */

        // Aplicar búsqueda si la hay (opcional)
        /* if ($this->search) {
            $taxes->where('some_field', 'like', '%' . $this->search . '%');
        }
        
        $taxes = $taxes->paginate($this->pagination);

        */

        // Inicialmente, $taxes será una colección vacía
        
        // Inicialmente, $taxes será una colección vacía
        $taxes = collect(); // ← ¡Aquí está el truco!

        // Solo si se ha seleccionado un usuario, cargamos los taxes
        if ($this->user) {
            $taxes = Tax::where('user_id', $this->user);

            // Opcional: si tienes búsqueda
            if ($this->search) {
                $taxes->where('some_field', 'like', '%' . $this->search . '%');
            }

            $taxes = $taxes->paginate($this->pagination);
        }
        
        return view('livewire.system.admin.taxes-index', [
            'users' => $users,
            'taxes' => $taxes,
        ]);
    }

    // Resetear página al cambiar perPage
    public function updatedPagination($value)
    {
        $this->resetPage();
    }

    public function updatedUser()
    {
        $this->resetPage(); // Si usas paginación y quieres volver a la página 1
    }

}
