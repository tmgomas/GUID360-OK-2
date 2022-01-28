<div>
    <button wire:click.prevent="newForm" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-1"></i> New Role</button>
    <form autocomplete="off" wire:submit.prevent="{{ $showEditModal ? 'updateRoleForm' : 'createRoleForm' }}">
        <x-adminlte-modal id="NewModal" title="New User"  theme="primary"
        icon="fas fa-user-plus" size="lg" static-backdrop scrollable wire:ignore.self>
    
        <div class="row">
            <input type="hidden" wire:model="ids">
            <x-adminlte-input type="text" name="name" wire:model.defer="name" label="Name" placeholder="Registrar" fgroup-class="col-md-12"/>
       
            
            <div class="col-12 table-responsive" style="text-transform: capitalize;">
                <table class="table table-bordered table-sm">
    
                    <tbody>
                        @foreach ($Permissions as $permission => $permission_list)
                      <tr>
                       
                        <td style="width: 3px">{{ $permission }}</td>
                        @foreach ($permission_list as $list)
                        <td style="width: 100px">
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="{{ $list->id }}" wire:model="permissionlist", value="{{ $list->id }}" name="permissionlist" {{ in_array($list->id , $permissionlist)? "checked":"" }}>
                                    <br/>
                                    <label for="{{ $list->id }}">
                                        <span class="text-sm" style="font-weight: 100;"> {{ $list->name }}</span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        @endforeach       
                      </tr>
                      @endforeach-
                    </tbody>
                  </table>
                </div>

            {{-- @php
            $config = [
                "placeholder" => "Select Permission",
                "allowClear" => true,
            ];

            @endphp
            
            {{-- <div class="col-12" style="text-transform: capitalize">
                <div wire:ignore>
                    <x-adminlte-select2 wire:model.defer="permission1" id="permission1" name="permission1" label="permission" multiple>
                        @foreach ($Permissions as $permission => $permission_list)
                            <option>{{ $permission }}</option> 
                            @foreach ($permission_list as $list)
                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach                               
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div> --}} --}}

            

            

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
        @this.set('permission', $('#permission').val());
        $('#permission').val(null).trigger('change');
    })
</script>
@endpush