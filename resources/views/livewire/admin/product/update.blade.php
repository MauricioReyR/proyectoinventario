<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Product') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.product.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Product')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                <input type='text' id='input-name' wire:model.lazy='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Description Input -->
            <div class='form-group'>
                <label for='input-description' class='col-sm-2 control-label '> {{ __('Description') }}</label>
                <input type='text' id='input-description' wire:model.lazy='description' class="form-control  @error('description') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('description') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Size Input -->
            <div class='form-group'>
                <label for='input-size' class='col-sm-2 control-label '> {{ __('Size') }}</label>
                <input type='number' id='input-size' wire:model.lazy='size' class="form-control  @error('size') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('size') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Color Input -->
            <div class='form-group'>
                <label for='input-color' class='col-sm-2 control-label '> {{ __('Color') }}</label>
                <input type='text' id='input-color' wire:model.lazy='color' class="form-control  @error('color') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('color') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Material Input -->
            <div class='form-group'>
                <label for='input-material' class='col-sm-2 control-label '> {{ __('Material') }}</label>
                <input type='text' id='input-material' wire:model.lazy='material' class="form-control  @error('material') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('material') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Price Input -->
            <div class='form-group'>
                <label for='input-price' class='col-sm-2 control-label '> {{ __('Price') }}</label>
                <input type='number' id='input-price' wire:model.lazy='price' class="form-control  @error('price') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('price') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- PriceSale Input -->
            <div class='form-group'>
                <label for='input-priceSale' class='col-sm-2 control-label '> {{ __('PriceSale') }}</label>
                <input type='number' id='input-priceSale' wire:model.lazy='priceSale' class="form-control  @error('priceSale') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('priceSale') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Stock Input -->
            <div class='form-group'>
                <label for='input-stock' class='col-sm-2 control-label '> {{ __('Stock') }}</label>
                <input type='number' id='input-stock' wire:model.lazy='stock' class="form-control  @error('stock') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('stock') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.product.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
