@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="cart" class="padding_center_2">

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
                        @if (count($cart) > 0)
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#ID</th>
                                  <th scope="col">Image</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Qty</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($cart as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td><a href="/details/{{ $item->product_id }}"><img src="{{ $item->img }}" class="img-thumbnail-list" alt="Image"></a></td>
                                        <td>{{ $item->name_en }}</td>
                                        <?php
                                            $price_show = "$".$item->price;
                                            if($item->discount != 0){
                                                $discounted_price = $item->price - ($item->price * $item->discount / 100);
                                                $price_show = "<del>$".$item->price."</del> $".$discounted_price;
                                            }
                                        ?>
                                        <td><?=$price_show?></td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <a href="/buyNow/{{ $item->id }}" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy this product"><i class="fas fa-shopping-cart"></i></a>
                                            <a href="/removeFromCart/{{ $item->id }}" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from cart"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $cart->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Pagination end -->
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection