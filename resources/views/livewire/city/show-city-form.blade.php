<div>
    <x-adminlte-card title="Title List" theme="primary" icon="fas  fa-Titles" class="p-0">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th style="wtitles_idth: 10px">#</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Status</th>
                    <th style="wtitles_idth:10%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($cities as $City)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$City->city_dis_id}} </td>
                        <td>{{$City->city_name_en}} </td>
                        <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" wire:click="$emit('updatingCityIsActive',{{ $City->city_id }},{{ $City->city_isActive === 1 ? '0' : '1' }})" class="custom-control-input" id="{{ $City->city_id }}" {{ $City->city_isActive === 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $City->city_id }}"></label>
                                </div>
                            </div>   
                        <td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="$emit('updateCity',{{ $City->city_id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="$emit('confirmCityeRemoval',{{ $City->city_id}})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
