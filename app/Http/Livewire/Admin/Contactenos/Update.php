<?php

namespace App\Http\Livewire\Admin\Contactenos;

use App\Models\Contactenos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $contactenos;

    public $name;
    public $description;
    
    protected $rules = [
        'name' => 'required|min:2|max:20',
        'description' => 'required|min:5|max:50',        
    ];

    public function mount(Contactenos $Contactenos){
        $this->contactenos = $Contactenos;
        $this->name = $this->contactenos->name;
        $this->description = $this->contactenos->description;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Contactenos') ]) ]);
        
        $this->contactenos->update([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.contactenos.update', [
            'contactenos' => $this->contactenos
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Contactenos') ])]);
    }
}
