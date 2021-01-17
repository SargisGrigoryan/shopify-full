@extends('layouts')

@section('content')

  <!-- Slider -->
  <section id="slider" class="padding_center_1">
  
      <!-- Headline -->
      <div class="headline">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12 text-center padding_bottom_1">
                      <div class="font_size_2"><b>WELCOME</b> Shopify</div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Headline end -->
    
      <!-- Content -->
      <div class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-12">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                  
                    <!-- Carousel item -->
                    <div class="carousel-item active">
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-6 text-lg-end text-center">
                                <div class="slider-text-side me-lg-5">
                                  <div class="font_size_4">Product name</div>
                                  <div class="font_size_7"><b>$99</b></div>
                                  <div class="font_size_10">
                                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                      when an unknown printer took a galley of type and scrambled it to make a type 
                                      specimen book. It has survived not only five centuries, but also the leap into 
                                      electronic typesetting, remaining essentially unchanged. It was popularised in 
                                      the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                      and more recently with desktop publishin.
                                  </div>
                                  <button type="button" class="bttn bttn-light">See more</button>
                                </div>
                            </div>
                            <div class="col-lg-6 text-lg-start text-center">
                                <div class="slider-image-side ms-lg-5">
                                  <img src="img/products/bestsaller-product.png" alt="slider image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel item end -->
                  
                    <!-- Carousel item -->
                    <div class="carousel-item">
                      <div class="row mb-4 align-items-center">
                          <div class="col-lg-6 text-lg-end text-center">
                              <div class="slider-text-side me-lg-5">
                                <div class="font_size_4">Product name</div>
                                <div class="font_size_7"><b>$99</b></div>
                                <div class="font_size_10">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type 
                                    specimen book. It has survived not only five centuries, but also the leap into 
                                    electronic typesetting, remaining essentially unchanged. It was popularised in 
                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                    and more recently with desktop publishin.
                                </div>
                                <button type="button" class="bttn bttn-light">See more</button>
                              </div>
                          </div>
                          <div class="col-lg-6 text-lg-start text-center">
                              <div class="slider-image-side ms-lg-5">
                                <img src="img/products/Intersection_2.png" alt="slider image">
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- Carousel item end -->
                  
                    <!-- Carousel item -->
                    <div class="carousel-item">
                      <div class="row mb-4 align-items-center">
                          <div class="col-lg-6 text-lg-end text-center">
                              <div class="slider-text-side me-lg-5">
                                <div class="font_size_4">Product name</div>
                                <div class="font_size_7"><b>$99</b></div>
                                <div class="font_size_10">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    when an unknown printer took a galley of type and scrambled it to make a type 
                                    specimen book. It has survived not only five centuries, but also the leap into 
                                    electronic typesetting, remaining essentially unchanged. It was popularised in 
                                    the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                                    and more recently with desktop publishin.
                                </div>
                                <button type="button" class="bttn bttn-light">See more</button>
                              </div>
                          </div>
                          <div class="col-lg-6 text-lg-start text-center">
                              <div class="slider-image-side ms-lg-5">
                                <img src="img/products/Intersection_3.png" alt="slider image">
                              </div>
                          </div>
                      </div>
                    </div>
                    <!-- Carousel item end -->
                  
                  </div>
              </div>
            </div>
            <div class="col-12 text-center mt-4">
              <a href="#top-products" class="scroll-down-link"><i class="fas fa-chevron-down"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Content end -->
  </section>
  <!-- Slider end -->
  
  <!-- Top products -->
  <section id="top-products" class="padding_center_1">
  
    <!-- Headline -->
    <div class="headline padding_bottom_1">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="font_size_3">Top <b>PRODUCTS</b></div>
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
            
              <!-- Top product -->
              <div class="product carousel-product">
                <span class="discounted">Discounted</span>
                <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                </ul>
              </div>
              <!-- Top product end -->
            
              <!-- Top product -->
              <div class="product carousel-product">
                <span class="discounted">Discounted</span>
                <a href="#"><img src="img/products/product_2.png" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                </ul>
              </div>
              <!-- Top product end -->
            
              <!-- Top product -->
              <div class="product carousel-product">
                <span class="discounted">Discounted</span>
                <a href="#"><img src="img/products/product_3.png" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                </ul>
              </div>
              <!-- Top product end -->
            
              <!-- Top product -->
              <div class="product carousel-product">
                <span class="discounted">Discounted</span>
                <a href="#"><img src="img/products/product_4.png" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                </ul>
              </div>
              <!-- Top product end -->
            
              <!-- Top product -->
              <div class="product carousel-product">
                <span class="discounted">Discounted</span>
                <a href="#"><img src="img/products/product_5.png" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
                </ul>
              </div>
              <!-- Top product end -->
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content end -->
  
  </section>
  <!-- Top products end -->
  
  <!-- All products -->
  <section id="all-products" class="padding_center_1">
  
    <!-- Headline -->
    <div class="headline">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="font_size_3"><b>ALL</b> Products</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Headline end -->
  
    <!-- Content -->
    <div class="content">
      <div class="container">
        <div class="row padding_center_1">
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
          <!-- Product -->
          <div class="col-xl-3 col-lg-4 col-md-6 col-12">
            <div class="product common-product">
              <span class="discounted">Discounted</span>
              <div class="stock">In stock</div>
              <a href="#"><img src="img/products/product_1.png" alt="Product image"></a>
              <ul>
                <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                <li><a href="#" class="product-name"><b>Product name</b></a><div><del>$99</del> $60</div></li>
              </ul>
            </div>
          </div>
          <!-- Product end -->
        
        </div>
        <div class="row">
            <div class="col-12 text-center">
              <button type="button" class="bttn bttn-dark my-0">Load more</button>
            </div>
        </div>
      </div>
    </div>
    <!-- Content end -->
  
  </section>
  <!-- All products end -->

@endsection