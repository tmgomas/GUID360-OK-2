@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Gender</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">    
            <livewire:gender.create-gender-form>

            <livewire:gender.show-gender-form>
        </div>
    </div>
@stop


@section('plugins.DatatablesPlugin', true)
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
