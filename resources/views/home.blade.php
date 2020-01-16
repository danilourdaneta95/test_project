@extends('layout')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('text.Welcome') }}</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col">
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row" id="list">
                            <div class="col-md-12" v-for="category in categories">
                                <h1>@{{ category.categoria }}</h1>
                                <h4>{{ __('text.Products') }}</h4>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('text.Name') }}</th>
                                            <th>{{ __('text.Description') }}</th>
                                            <th>{{ __('text.Price') }}</th>
                                            <th>{{ __('text.Discount') }}</th>
                                            <th>{{ __('text.IGV') }}</th>
                                            <th>{{ __('text.FinalPrice') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in category.productos">
                                            <td>@{{ product.nombre }}</td>
                                            <td>@{{ product.descripcion }}</td>
                                            <td>@{{ Number(parseFloat(product.precio)).toLocaleString('en') }}</td>
                                            <td>@{{ Number(parseFloat(product.descuento)).toLocaleString('en') }}</td>
                                            <td>@{{ Number(parseFloat((product.precio * 0.18))).toLocaleString('en') }}</td>
                                            <td>@{{ Number(parseFloat(product.precio) + parseFloat(product.precio * 0.18) - parseFloat(product.descuento)).toLocaleString('en') }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

