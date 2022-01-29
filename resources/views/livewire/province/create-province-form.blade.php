<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New Province</button>
    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateProvinceForm' : 'createProvinceForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="pro_id">
            @php
            $config = [
                "placeholder" => "Select  options...",
                "allowClear" => true,
            ];
            @endphp
            <div class="col-lg-12">
                <div wire:ignore>
                    <x-adminlte-select2 name="pro_country_id"  id="pro_country_id" wire:model.defer='pro_country_id' :config="$config" label="Country" igroup-size="sm">
                        <option></option>
                        @foreach ($Countries as $Country)
                            <option value="{{ $Country->coun_id }}">{{ $Country->coun_name_en }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div> 
            <x-adminlte-input type="text" name="pro_name_en" wire:model.defer="pro_name_en" label="English Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="pro_name_si" wire:model.defer="pro_name_si" label="Sinhala Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="pro_name_ta" wire:model.defer="pro_name_ta" label="Tamile Name" placeholder="placeholder" fgroup-class="col-md-4"/>

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
        @this.set('pro_country_id', $('#pro_country_id').val());
        $('#pro_country_id').val(null).trigger('change');

    })
</script>
@endpush