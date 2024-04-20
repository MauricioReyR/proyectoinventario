<?php

namespace App\Http\Livewire\Admin\Contactenos;

use App\Models\Contactenos;
use Livewire\Component;

class Single extends Component
{

    public $contactenos;

    public function mount(Contactenos $Contactenos){
        $this->contactenos = $Contactenos;
    }

    public function delete()
    {
        $this->contactenos->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Contactenos') ]) ]);
        $this->emit('contactenosDeleted');
    }

    public function render()
    {
        return view('livewire.admin.contactenos.single')
            ->layout('admin::layouts.app');
    }
}
