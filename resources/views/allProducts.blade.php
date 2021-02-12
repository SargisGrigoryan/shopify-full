@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="allProduct" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">All products</div>
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
                        @if (count($products) > 0)
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
                                        <td><a href="/details/{{ $product->id }}"><img src="{{ $product->img }}" class="img-thumbnail-list" alt="Image"></a></td>
                                        <td>{{ $product->name_en }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->discount }}%</td>
                                        <td>{{ $product->in_stock }}</td>
                                        <td>{{ $product->slider==1?'On':'Off' }}</td>
                                        <td>{{ $product->top==1?'On':'Off' }}</td>
                                        <td>{{ $product->date }}</td>
                                        <td>{{ $product->status==1?'Active':'Blocked' }}</td>
                                        <td>
                                            @if ($product->status != 0)
                                                <a href="/blockProduct/{{ $product->id }}" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"><i class="fas fa-ban"></i></a>
                                            @elseif($product->status != 1)
                                                <a href="/recoverProduct/{{ $product->id }}" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Recover"><i class="fas fa-undo-alt"></i></a>
                                            @endif
                                            <a href="/removeProduct/{{ $product->id }}" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                  @endforeach
                              </tbody>
                            </table>
                            @else
                            <hr>
                            <div class="font_size_7 color_5 text-center">No result is found</div>
                        @endif
                        
                    </div>
                    <!-- Pagination -->
                    <div class="col-12 text-center mt-3">
                        {{ $products->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Pagination end -->
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection