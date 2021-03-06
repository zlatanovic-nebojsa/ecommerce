@extends('layouts.master')

@section('title')
    PC SHOP
@endsection

@section('content')
    <div class="row">
        @include('partials.sidebar')
        <div class="col-lg-8 col-xl-9 ml-5">
            @include('partials.carousel')

            @if(Session::has('success'))
                <div class="row">
                    <div class="col-sm-6 col-md-4 mx-auto">
                        <div id="charge-message" class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-6 col-sm-6 d-flex align-items-stretch mb-5">
                        <div class="card-deck">
                            <a href="{{route('product.show', ['id' => $product->id])}}">
                            <div class="card">
                                <img class="card-img-top" src="{{ $product->imagePath }}" alt="">
                                <div class="card-block">
                                    <h2 class="card-title">{{ $product->title }}
                                    </h2>
                                    <h5>$ {{ $product->price }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Category:</small>
                                    <p>{{ $product->sub_category->name }}</p>
                                    <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                       class="btn btn-success pull-right" role="button">Add to Cart</a>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.row -->
@endsection