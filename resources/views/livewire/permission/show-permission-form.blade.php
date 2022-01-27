<div>
    <x-adminlte-card title="Permission List" theme="primary" icon="fas  fa-Permissions" class="p-0">
        <table class="table table-bordered ">
            <thead>
                <tr class="text-center">
                    <th style="width: 10px"> </th>
                    <th>Index</th>
                    <th>Create</th>
                    <th>Store</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Update</th>
                    <th>Destroy</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @foreach ($Permissions as $permission => $permission_list)
                    <td style="text-transform:capitalize"><b>{{ $permission }}</b></td>

                    @foreach ($permission_list as $list)

                    <td class="text-center">
                    @if($list->name)         
                    <i class="far fa-check-circle text-success"></i>     
                    @else

                    @endif

                    {{-- <a href="#" wire:click.prevent="$emit('confirmPermissionRemoval',{{ $list->id }})"><i class="fas fa-times-circle text-danger"></i></a> --}}

                    </td>
                    @endforeach
                </tr>
            </tbody>
                    @endforeach
        </table>
    </x-adminlte-card>

    <x-alert.confirmation-alert />  
</div>
@push('js')
<script>


</script>
@endpush

