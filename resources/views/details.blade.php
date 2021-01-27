@extends('layouts')

@section('content')

      <!-- Details -->
      <section id="details" class="padding_center_1">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <div class="details-image-side">
                          <img src="{{ $details->img }}" alt="Details image" class="img-resp details-general-image">
                          <ul>
                              <li><img src="{{ $details->img }}" alt="Details image" class="img-resp details-secondary-image"></li>
                              @foreach ($gallery as $img)
                                <li><img src="{{ $img->src }}" alt="Details image" class="img-resp details-secondary-image"></li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 mt-3">
                      <div class="font_size_4">{{ $details->name_en }}</div>
                      <div>{{ $details->in_stock>0?'In stock':'Not in stock' }}</div>
                      <?php
                        $price_show = "$".$details->price;
                        if($details->discount != 0){
                          $discounted_price = $details->price - ($details->price * $details->discount / 100);
                          $price_show = "<del>$".$details->price."</del> $".$discounted_price;
                        }
                        $details->price;
                      ?>
                      <div class="font_size_7"><?=$price_show?></div>
                      <div class="font_size_11">{{ $details->descr_en }}</div>
                      <ul>
                          <?php
                            $options_array = explode(", ", $details->options_en);
                          ?>
                          @foreach ($options_array as $option)
                              <li>{{ $option }}</li>
                          @endforeach
                      </ul>
                      <div>
                          Quantity - <input type="number" name="qty" class="custom-input">
                      </div>
                      @if (!session()->has('admin'))
                        <div>
                          <button type="button" class="bttn bttn-dark">Buy now</button>
                          <button type="button" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="fas fa-shopping-basket"></i></button>
                          <button type="button" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                        </div>
                      @else
                        <div><a href="/editProduct/{{ $details->id }}" class="bttn bttn-dark">Edit</a></div>
                      @endif
                  </div>
              </div>
          </div>
      </section>
      <!-- Details end -->


    <!-- Coments -->
    <section id="comments">

        <!-- Headline -->
        <div class="headline">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">Reviews</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headline end -->

        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="row">

                    <!-- Leave comment -->
                    <div class="col-12 mb-5">
                        <form>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Leave your comment</label>
                            </div>
                            <button type="submit" class="bttn bttn-dark">Send</button>
                        </form>
                        <hr>
                    </div>
                    <!-- Leave comment end -->

                    <!-- User comment -->
                    <div class="col-12 d-flex justify-content-md-start justify-content-center">
                        <div class="comment-bg">
                            <div class="user-img">
                                <img src="/img/users/no_user_img.jpg" alt="User image" class="img-resp">
                            </div>
                            <div class="user-comment">
                                <div class="font_size_9"><b>User name</b></div>
                                <div class="font-size_10">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                    Sint maxime deleniti voluptas sit vitae laudantium mollitia 
                                    neque aliquid impedit perferendis dignissimos aspernatur 
                                    accusamus voluptates, odio amet in! Nisi, cum accusamus.
                                </div>
                                <div class="mt-2 font_size_13 color_5">15.01.2021</div>
                            </div>
                        </div>
                    </div>
                    <!-- User comment end -->

                    <!-- User comment -->
                    <div class="col-12 d-flex justify-content-md-end justify-content-center text-end">
                        <div class="comment-bg">
                            <div class="user-comment user-comment-me">
                                <div class="font_size_9"><b>User name</b></div>
                                <div class="font-size_10">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                                    Sint maxime deleniti voluptas sit vitae laudantium mollitia 
                                    neque aliquid impedit perferendis dignissimos aspernatur 
                                    accusamus voluptates, odio amet in! Nisi, cum accusamus.
                                </div>
                                <div class="mt-2 font_size_13 color_5">15.01.2021</div>
                            </div>
                            <div class="user-img">
                                <img src="/img/users/no_user_img.jpg" alt="User image" class="img-resp">
                            </div>
                        </div>
                    </div>
                    <!-- User comment end -->

                    <!-- Load more button -->
                    <div class="col-12 text-center mb-5">
                        <button type="button" class="bttn bttn-dark">Load more</button>
                    </div>
                    <!-- Load more button end -->

                </div>
            </div>
        </div>
        <!-- Content end -->

    </section>
    <!-- Coments end -->


    <!-- Similar products -->
    <section id="similar-products" class="padding_center_1">

      <!-- Headline -->
      <div class="headline padding_bottom_1">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="font_size_3">Similar <b>PRODUCTS</b></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Headline end -->
    
      <!-- Content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel">
    
                <!-- Similar product -->
                <div class="product carousel-product">
                  <span class="discounted">Discounted</span>
                  <a href="#"><img src="/img/products/product_1.png" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                  </ul>
                </div>
                <!-- Similar product end -->
    
                <!-- Similar product -->
                <div class="product carousel-product">
                  <span class="discounted">Discounted</span>
                  <a href="#"><img src="/img/products/product_2.png" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                  </ul>
                </div>
                <!-- Similar product end -->
    
                <!-- Similar product -->
                <div class="product carousel-product">
                  <span class="discounted">Discounted</span>
                  <a href="#"><img src="/img/products/product_3.png" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                  </ul>
                </div>
                <!-- Similar product end -->
    
                <!-- Similar product -->
                <div class="product carousel-product">
                  <span class="discounted">Discounted</span>
                  <a href="#"><img src="/img/products/product_4.png" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                  </ul>
                </div>
                <!-- Similar product end -->
    
                <!-- Similar product -->
                <div class="product carousel-product">
                  <span class="discounted">Discounted</span>
                  <a href="#"><img src="/img/products/product_5.png" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                  </ul>
                </div>
                <!-- Similar product end -->
    
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content end -->
    
    </section>
    <!-- Similar products end -->

@endsection