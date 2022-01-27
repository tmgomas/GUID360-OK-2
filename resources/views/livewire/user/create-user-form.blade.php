<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> Add New User</button>
    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateUserForm' : 'createUserForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="ids">
            <x-adminlte-input type="text" name="name" wire:model.defer="name" label="Name" placeholder="Jone Doe" fgroup-class="col-md-12"/>

            <x-adminlte-input type="email" name="email" wire:model="email" label="email" placeholder="exsample@gmail.com" fgroup-class="col-md-12"/>

            <x-adminlte-input type="password" name="password" wire:model.defer="password" label="password" placeholder="admin@!980890" fgroup-class="col-md-12"/>

            <x-adminlte-input type="password" name="password_confirmation" wire:model.defer="password_confirmation" label="Confirm Password" placeholder="admin@!980890" fgroup-class="col-md-12"/>
            
            <div class="col-12">
                @php
                    $config = [
                        "placeholder" => "Select multiple options...",
                        "allowClear" => true,
                    ];
                @endphp
                <div wire:ignore>
                    <x-adminlte-select2 :config="$config" wire:model="roles" id="roles" name="roles" label="Roles">
                        <option></option>
                        @foreach ($rolesName as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>
            
        </div>
        
        <x-slot name="footerSlot">
            <div class="d-flex">
                <div class="ml-auto">
                    <x-adminlte-button type="sumbit"  theme="success" label="Accept"/>
                    <x-adminlte-button type="reset" theme="danger" label="Dismiss" data-dismiss="modal"/>
                </div>
            </div>
        
        </x-slot>
        </x-adminlte-modal>
    </form>
    
</div>
@push('js')

<script>
    $(document).ready(function () {
      
        $('#isActive').on('change', function (e) {
            let data = $(this).val();
             @this.set('category', data);
        });
       
    });  
</script>
<script>
    $('form').submit(function() {
        @this.set('isActive', $('#isActive').val());
        $('#isActive').val(null).trigger('change');
    })
</script>
@endpush
