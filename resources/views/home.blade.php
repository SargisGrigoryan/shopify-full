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
                    @for ($i = 0; $i < count($slider_products); $i++)
                      @if (count($slider_products) > 1)
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="{{ $i==0?'active':'' }}"></li>
                      @endif
                    @endfor
                  </ol>
                  <div class="carousel-inner">
                    <?php
                      $counter = 0;  
                    ?>
                    @foreach ($slider_products as $slider_product)
                      <!-- Carousel item -->
                      <div class="carousel-item {{ $counter==0?'active':'' }}">
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-6 text-lg-end text-center">
                                <div class="slider-text-side me-lg-5">
                                  <div class="font_size_4">{{ $slider_product->name_en }}</div>
                                  <?php
                                    $price_show = "$".$slider_product->price;
                                    if($slider_product->discount != 0){
                                      $discounted_price = $slider_product->price - ($slider_product->price * $slider_product->discount / 100);
                                      $price_show = "<del>$".$slider_product->price."</del> $".$discounted_price;
                                    }
                                    $slider_product->price;
                                  ?>
                                  <div class="font_size_7"><?=$price_show?></div>
                                  <div class="font_size_10">{{ $slider_product->descr_en }}</div>
                                  <a href="/details/{{ $slider_product->id }}" class="bttn bttn-light">See more</a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-lg-start text-center">
                                <div class="slider-image-side ms-lg-5">
                                  <a href="/details/{{ $slider_product->id }}">
                                    <img src="{{ $slider_product->slider_img }}" alt="slider image">
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel item end -->
                    <?php
                      $counter++;
                    ?>
                    @endforeach
                  
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
            
              @foreach ($top_products as $top_product)
                <!-- Top product -->
                <div class="product carousel-product">
                  @if ($top_product->discount != 0)
                    <span class="discounted">Discounted</span>
                  @endif
                  <a href="/details/{{ $top_product->id }}"><img src="{{ $top_product->img }}" alt="Product image"></a>
                  <ul>
                    <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                    <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                    <?php
                      $price_show = "$".$top_product->price;
                      if($top_product->discount != 0){
                        $discounted_price = $top_product->price - ($top_product->price * $top_product->discount / 100);
                        $price_show = "<del>$".$top_product->price."</del> $".$discounted_price;
                      }
                      $top_product->price;
                    ?>
                    <li><a href="/details/{{ $top_product->id }}" class="product-name"><b>{{ $top_product->name_en }}</b></a><div><?=$price_show?></div></li>
                  </ul>
                </div>
                <!-- Top product end -->
              @endforeach
            
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

          @foreach ($all_product as $product)
            <!-- Product -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
              <div class="product common-product">
                @if ($product->discount != 0)
                  <span class="discounted">Discounted</span>
                @endif
                <div class="stock">{{ $product->in_stock!=0?'In stock':'Not in stock' }}</div>
                <a href="/details/{{ $product->id }}"><img src="{{ $product->img }}" alt="Product image"></a>
                <ul>
                  <li><button type="button" class="bttn bttn-product"><i class="far fa-heart"></i></button></li>
                  <li><button type="button" class="bttn bttn-product"><i class="fas fa-shopping-basket"></i></button></li>
                  <?php
                    $price_show = "$".$product->price;
                    if($product->discount != 0){
                      $discounted_price = $product->price - ($product->price * $product->discount / 100);
                      $price_show = "<del>$".$product->price."</del> $".$discounted_price;
                    }
                    $product->price;
                  ?>
                  <li><a href="/details/{{ $product->id }}" class="product-name"><b>{{ $product->name_en }}</b></a><div><?=$price_show?></div></li>
                </ul>
              </div>
            </div>
            <!-- Product end -->
          @endforeach
        
        </div>
        <div class="row">

          <!-- Pagination -->
          <div class="col-12 text-center mt-3">
            <hr>
            {{ $all_product->links('vendor.pagination.custom') }}
          </div>
          <!-- Pagination end -->

        </div>
      </div>
    </div>
    <!-- Content end -->
  
  </section>
  <!-- All products end -->

@endsection