
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
                    <li class="breadcrumb-item active">{{ __('text.Show') }}</li>
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
                        <h3 class="card-title">{{ __('text.ShowCategory') }}</h3>
                    </div>
                    <div class="card-body">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">{{ __('text.Name') }}:</label>
                                    <p>{{ $categoria->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="descripcion">{{ __('text.Description') }}:</label>
                                    <p>{{ $categoria->descripcion }}</p>
                                </div>
                            </div>
                            <br /><br /><br /><br />
                        </div>
                        @if ($categoria->productos->count() > 0)
                          <div class="row">
                              <div class="col-md-12">
                                  <h5>{{ __('text.Products') }}</h5>
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
                                          @foreach ($categoria->productos as $producto)
                                          <tr>
                                              <td>{{ $producto->nombre }}</td>
                                              <td>{{ $producto->descripcion }}</td>
                                              <td>{{ number_format($producto->precio, 2,'.', ',') }}</td>
                                              <td>{{ number_format($producto->descuento, 2,'.', ',') }}</td>
                                              <td>
                                                  <a href="{{ route('ProductosShow', $producto->id) }}" target="_blank"><i class="fa fa-eye" style="font-size:12px;"></i> {{ __('text.Show') }}</a>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                      <th colspan="2"><strong>{{ __('text.TotalPrice') }}:</strong></th>
                                      <th colspan="2">
                                          {{ number_format($categoria->productos->sum('precio'), 2,'.', ',') }}
                                          +
                                          {{ number_format(($categoria->productos->sum('precio') * 0.18), 2,'.', ',') }} (IGV)
                                          =
                                          <span style="font-size:24px;">{{ number_format($categoria->productos->sum('precio') + ($categoria->productos->sum('precio') * 0.18), 2,'.', ',') }}</span>
                                      </th>
                                      <th></th>
                                      </tfoot>
                                  </table>
                                  {{ $categoria->productos->links() }}
                              </div>
                          </div>
                        @else
                        <div class="text-center">
                            <h4>{{ __('text.ThisCategoryHasNoProducts') }}</h4>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection