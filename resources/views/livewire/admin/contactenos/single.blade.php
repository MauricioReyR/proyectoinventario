<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $contactenos->name }}</td>
    <td class="">{{ $contactenos->description }}</td>
    
    @if(getCrudConfig('Contactenos')->delete or getCrudConfig('Contactenos')->update)
        <td>

            @if(getCrudConfig('Contactenos')->update && hasPermission(getRouteName().'.contactenos.update', 1, 1, $contactenos))
                <a href="@route(getRouteName().'.contactenos.update', $contactenos->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Contactenos')->delete && hasPermission(getRouteName().'.contactenos.delete', 1, 1, $contactenos))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Contactenos') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Contactenos') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
