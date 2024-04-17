<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $product;

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

    public function mount(Product $Product){
        $this->product = $Product;
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->size = $this->product->size;
        $this->color = $this->product->color;
        $this->material = $this->product->material;
        $this->price = $this->product->price;
        $this->priceSale = $this->product->priceSale;
        $this->stock = $this->product->stock;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Product') ]) ]);
        
        $this->product->update([
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
    }

    public function render()
    {
        return view('livewire.admin.product.update', [
            'product' => $this->product
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Product') ])]);
    }
}
