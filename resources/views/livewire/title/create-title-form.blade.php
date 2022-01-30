<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New Permission</button>

    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateTitleForm' : 'createTitleForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="titles_id">
            <x-adminlte-input type="text" name="titles_name" wire:model.defer="titles_name" label="Title" placeholder="placeholder" fgroup-class="col-md-12"/>

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

</script>
@endpush