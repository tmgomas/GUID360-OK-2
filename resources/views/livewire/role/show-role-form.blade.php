<div>
    <x-adminlte-card title="Role List" theme="primary" icon="fas  fa-Roles" class="p-0">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Role Action</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($Roles as $Role)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$Role->name}} </td>
                        <td>{{$Role->guard_name }}</td>
                        <td>
                            @foreach ($Role->permissions as $item)
                            <span class="right badge badge-info">
                               {{$item->name}}
                              </span>
                            @endforeach
                        </td>
                        <td>
                            {{$Role->creator->name ?? ''}}
                            {{$Role->editor->name ?? ''}}
                           
                        </td>
                       
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="$emit('updateRole',{{ $Role->id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="$emit('confirmRoleRemoval',{{ $Role->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                <tr class="text-center">
                    <td colspan="6">
                        <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                        <p class="mt-2">No results found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
    
<x-alert.confirmation-alert />  
</div>
@push('js')
<script>
   

</script>
@endpush

