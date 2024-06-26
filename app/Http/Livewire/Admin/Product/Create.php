<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $size;
    public $color;
    public $material;
    public $price;
    public $priceSale;
    public $stock;
    
    protected $rules = [
        'name' => 'required|min:2|max:50',
        'description' => 'required|min:3|max:50',
        'size' => 'required|min:1|max:2',
        'price' => 'required|min:0',
        'priceSale' => 'required|min:0',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Product') ])]);
        
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'size' => $this->size,
            'color' => $this->color,
            'material' => $this->material,
            'price' => $this->price,
            'priceSale' => $this->priceSale,
            'stock' => $this->stock,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.product.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Product') ])]);
    }
}
