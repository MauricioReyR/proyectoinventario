<?php

namespace App\Http\Livewire\Admin\Contactenos;

use App\Models\Contactenos;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    
    protected $rules = [
        'name' => 'required|min:2|max:20',
        'description' => 'required|min:5|max:50',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Contactenos') ])]);
        
        Contactenos::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.contactenos.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Contactenos') ])]);
    }
}
