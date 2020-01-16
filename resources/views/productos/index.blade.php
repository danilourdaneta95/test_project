@extends('layout')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('text.Products') }}</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('ProductosNew') }}">{{ __('text.New') }}</a>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-border">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('text.List') }} ({{ $productos->count() }})
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                @if ($errors->any())
                                    <div class="text-center">
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($productos->count() > 0)
                                    <table class="table table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('text.Name') }}</th>
                                                <th>{{ __('text.Description') }}</th>
                                                <th>{{ __('text.Price') }}</th>
                                                <th>{{ __('text.Discount') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->nombre }}</td>
                                                <td>{{ $producto->descripcion }}</td>
                                                <td>{{ number_format($producto->precio, 2,'.', ',') }}</td>
                                                <td>{{ number_format($producto->descuento, 2,'.', ',') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-caret-down"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -159px, 0px);">
                                                            <li><a class="dropdown-item" href="{{ route('ProductosShow', $producto->id) }}"><i class="fa fa-eye" style="font-size:12px;"></i> {{ __('text.Show') }}</a> </li>
                                                            <li><a class="dropdown-item" href="{{ route('ProductosEdit', $producto->id) }}"><i class="fa fa-edit" style="font-size:12px;"></i> {{ __('text.Edit') }}</a></li>
                                                            <li><a class="dropdown-item" href="{{ route('ProductosDestroy', $producto->id) }}" onclick="return confirm('{{ __('text.ConfirmDelete') }}');"><i class="fa fa-times" style="font-size:12px;"></i> {{ __('text.Delete') }}</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $productos->links() }}
                                @else
                                    <div class="text-center">
                                        <h4>{{ __('text.NoRecords') }}</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection