<div>
    <x-adminlte-card title="Title List" theme="primary" icon="fas  fa-Titles" class="p-0">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="wtitles_idth: 10px">#</th>
                    <th>Country Name</th>
                    <th>Province</th>
                    <th>Status</th>
                    <th style="wtitles_idth:10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($Provinces as $Province)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$Province->pro_country_id}}</td>
                        <td>{{$Province->pro_name_en}} </td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" wire:click="$emit('updatingProvinceIsActive',{{ $Province->pro_id }},{{ $Province->pro_isActive === 1 ? '0' : '1' }})" class="custom-control-input" id="{{ $Province->pro_id }}" {{ $Province->pro_isActive === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $Province->pro_id }}"></label>
                                </div>
                            </div>  
                        <td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="$emit('updateProvince',{{ $Province->pro_id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="$emit('confirmProvinceRemoval',{{ $Province->pro_id}})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                <tr class="text-center">
                    <td colspan="5">
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
