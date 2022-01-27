<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New Permission</button>
    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updatePermissionForm' : 'createPermissionForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div>
            <input type="hidden" wire:model="ids">
            <x-adminlte-input type="text" name="PermissionName" wire:model="PermissionName" label="Permissio nName" placeholder="placeholder" fgroup-class="col-md-12"/>
            <input type="hidden" wire:model="name_group" value="{{$PermissionName}}">
        </div>
        
        <div class="form-group clearfix">

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_access" wire:model="name", value="{{$PermissionName}}.index" checked>
                <label for="name_access">
                    Index
                </label>
            </div>
            <br>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_create" wire:model="name", value="{{$PermissionName}}.create" checked>
                <label for="name_create">
                    Create
                </label>
            </div>
            <br>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_show" wire:model="name", value="{{$PermissionName}}.store" checked>
                <label for="name_show">
                    Store
                </label>
            </div>
            <br>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_show" wire:model="name", value="{{$PermissionName}}.show" checked>
                <label for="name_show">
                    Show
                </label>
            </div>
            <br>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_show" wire:model="name", value="{{$PermissionName}}.edit" checked>
                <label for="name_show">
                    Edit
                </label>
            </div>
            <br>

            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_update" wire:model="name", value="{{$PermissionName}}.update" checked>
                <label for="name_update">
                    Update
                </label>
            </div>
            <br>
            <div class="icheck-primary d-inline">
                <input type="checkbox" id="name_delete" wire:model="name", value="{{$PermissionName}}.destroy" checked>
                <label for="name_delete">
                    Destroy
                </label>
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
    // $('form').submit(function() {
    //     @this.set('roles', $('#roles').val());
    //     $('#roles').val(null).trigger('change');
    // })
</script>
@endpush