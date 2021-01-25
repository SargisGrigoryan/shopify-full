@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="allProduct" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">All product</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headline end -->

        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#ID</th>
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Disc.</th>
                              <th scope="col">Stock</th>
                              <th scope="col">Slider</th>
                              <th scope="col">Top</th>
                              <th scope="col">Date</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td><img src="{{ $product->img }}" class="img-thumbnail-list" alt="Image"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ $product->in_stock }}</td>
                                    <td>{{ $product->slider }}</td>
                                    <td>{{ $product->top }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        <a href="#" class="bttn bttn-dark"><i class="fas fa-trash-alt"></i></a>
                                        <a href="#" class="bttn bttn-dark"><i class="fas fa-ban"></i></a>
                                        <a href="#" class="bttn bttn-dark"><i class="fas fa-undo-alt"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection