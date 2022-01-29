<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New City</button>

    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateCityForm' : 'createCityForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="city_id">
            @php
            $config = [
                "placeholder" => "Select  options...",
                "allowClear" => true,
            ];
            @endphp
            <div class="col-lg-12">
                <div wire:ignore>
                    <x-adminlte-select2 name="city_dis_id"  id="city_dis_id" wire:model.defer='city_dis_id' :config="$config" label="City" igroup-size="sm">
                        <option></option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->dist_id }}">{{ $district->dist_name_en }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div> 
            <x-adminlte-input type="text" name="city_name_en" wire:model.defer="city_name_en" label="English Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="city_name_si" wire:model.defer="city_name_si" label="Sinhala Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="city_name_ta" wire:model.defer="city_name_ta" label="Tamile Name" placeholder="placeholder" fgroup-class="col-md-4"/>
            <x-adminlte-input type="text" name="postcode" wire:model.defer="postcode" label="Psotal Code" placeholder="placeholder" fgroup-class="col-md-12"/>

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
        @this.set('city_dis_id', $('#city_dis_id').val());
        $('#city_dis_id').val(null).trigger('change');

    })
</script>
@endpush