<div>
    <x-adminlte-card title="User List" theme="primary" icon="fas  fa-users" class="p-0">
        <table class="table table-striped table-bordered table-hover p-0">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>User Action</th>
                    <th>Status</th>
                    <th style="width:10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            {{-- {{$user->creator->name ?? ''}}
                            {{$user->editor->name ?? ''}}
                            --}}
                        </td>
                        
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" wire:click="$emit('updatingIsActive',{{ $user->id }},{{ $user->isActive === 1 ? '0' : '1' }})" class="custom-control-input" id="{{ $user->id }}" {{ $user->isActive === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $user->id }}"></label>
                                </div>
                            </div>   
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="$emit('updateUser',{{ $user->id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="$emit('confirmUserRemoval',{{ $user->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
    $('#1').on('change', function() {
        $('isActive').toggleClass('isActive');
    })
</script>
@endpush
