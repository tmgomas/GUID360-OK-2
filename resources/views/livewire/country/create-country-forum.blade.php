<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New Country</button>
    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateCountryForm' : 'createCountryForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="coun_id">
            <x-adminlte-input type="text" name="coun_name_en" wire:model.defer="coun_name_en" label="Country" placeholder="placeholder" fgroup-class="col-md-12"/>

            <x-adminlte-input type="text" name="coun_code" wire:model.defer="coun_code" label="Code" placeholder="placeholder" fgroup-class="col-md-12"/>

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