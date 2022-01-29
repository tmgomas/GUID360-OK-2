<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New District</button>

    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateDistrictForm' : 'createDistrictForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="dist_id">
            @php
            $config = [
                "placeholder" => "Select  options...",
                "allowClear" => true,
            ];
            @endphp
            <div class="col-lg-12">
                <div wire:ignore>
                    <x-adminlte-select2 name="dist_pro_id"  id="dist_pro_id" wire:model.defer='dist_pro_id' :config="$config" label="Proovince" igroup-size="sm">
                        <option></option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->pro_id }}">{{ $province->pro_name_en }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div> 
            <x-adminlte-input type="text" name="dist_name_en" wire:model.defer="dist_name_en" label="English Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="dist_name_si" wire:model.defer="dist_name_si" label="Sinhala Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="dist_name_ta" wire:model.defer="dist_name_ta" label="Tamile Name" placeholder="placeholder" fgroup-class="col-md-4"/>

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
    $('form').submit(function() {
        @this.set('dist_pro_id', $('#dist_pro_id').val());
        $('#dist_pro_id').val(null).trigger('change');

    })
</script>
@endpush