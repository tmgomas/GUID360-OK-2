<div>
    <x-adminlte-card title="Religion List" theme="primary" icon="fas  fa-Religions" class="p-0">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="wreligion_idth: 10px">#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="wreligion_idth:10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($Religions as $Religion)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$Religion->religion_name}} </td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox"  wire:click="$emit('updatingReligionIsActive',{{ $Religion->religion_id }},{{ $Religion->religion_isActive === 1 ? '0' : '1' }})" class="custom-control-input" id="{{ $Religion->religion_id }}" {{ $Religion->religion_isActive === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $Religion->religion_id }}"></label>
                                </div>
                            </div>   
                        </td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="$emit('updateReligion',{{ $Religion->religion_id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="$emit('confirmReligionRemoval',{{ $Religion->religion_id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
