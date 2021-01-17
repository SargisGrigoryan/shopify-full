@extends('layouts')

@section('content')

    <!-- Details -->
    <section id="details" class="padding_center_1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="details-image-side">
                        <img src="img/products/product_2.png" alt="Details image" class="img-resp details-general-image">
                        <ul>
                            <li><img src="img/products/product_2.png" alt="Details image" class="img-resp details-secondary-image"></li>
                            <li><img src="img/products/product_1.png" alt="Details image" class="img-resp details-secondary-image"></li>
                            <li><img src="img/products/product_3.png" alt="Details image" class="img-resp details-secondary-image"></li>
                            <li><img src="img/products/product_4.png" alt="Details image" class="img-resp details-secondary-image"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="font_size_4">Product name</div>
                    <div>In stock</div>
                    <div class="font_size_7"><del>$99</del> $60</div>
                    <div class="font_size_11">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type 
                        specimen book. It has survived not only five centuries, but also the leap into 
                        electronic typesetting, remaining essentially unchanged. It was popularised in 
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                        and more recently with desktop publishing software like Aldus PageMaker including 
                        versions of Lorem Ipsum.
                    </div>
                    <ul>
                        <li>Lorem Ipsum</li>
                        <li>Dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Donec in dolor sed</li>
                    </ul>
                    <div>
                        Quantity - <input type="number" name="qty" class="custom-input">
                    </div>
                    <div>
                        <button type="button" class="bttn bttn-dark">Buy now</button>
                        <button type="button" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="fas fa-shopping-basket"></i></button>
                        <button type="button" class="bttn bttn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><i class="far fa-heart"></i></button>
                    </div>
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
                                <img src="img/users/user_img.jpg" alt="User image" class="img-resp">
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
                                <img src="img/users/user_img.jpg" alt="User image" class="img-resp">
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
                  <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
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
                  <a href="#"><img src="img/products/product_2.png" alt="Product image"></a>
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
                  <a href="#"><img src="img/products/product_3.png" alt="Product image"></a>
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
                  <a href="#"><img src="img/products/product_4.png" alt="Product image"></a>
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
                  <a href="#"><img src="img/products/product_5.png" alt="Product image"></a>
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