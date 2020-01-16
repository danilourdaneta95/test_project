@extends('layout')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('text.Categories') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('Categorias') }}">{{ __('text.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('text.Edit') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col">
                <div class="card card-border">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('text.EditCategory') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('CategoriasUpdate') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $categoria->id }}">
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
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> {{ __('text.Save') }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">{{ __('text.Name') }}:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $categoria->nombre }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="descripcion">{{ __('text.Description') }}:</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $categoria->descripcion }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection