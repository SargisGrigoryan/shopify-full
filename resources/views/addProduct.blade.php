@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="addProduct" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">Add product</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headline end -->

        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <form action="/addProduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="Input1" class="form-label">Product name EN</label>
                              <input type="text" class="form-control" id="Input1" name="name_en" placeholder="Product name">
                            </div>
                            <div class="mb-3">
                              <label for="Input2" class="form-label">Product name RU</label>
                              <input type="text" class="form-control" id="Input2" name="name_ru" placeholder="Product name">
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Description EN</label>
                                <textarea class="form-control mt-2" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="descr_en"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea2">Description RU</label>
                                <textarea class="form-control mt-2" placeholder="Description" id="floatingTextarea2" style="height: 100px" name="descr_ru"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="Input3" class="form-label">General image</label>
                                <input type="file" class="form-control" id="Input3" name="general_img">
                            </div>
                            <div class="mb-3">
                                <label for="Input3" class="form-label">Gallery</label>
                                <input type="file" class="form-control" id="Input3" name="gallery_1">
                                <input type="file" class="form-control mt-2" id="Input3" name="gallery_2">
                                <input type="file" class="form-control mt-2" id="Input3" name="gallery_3">
                            </div>
                            <div class="mb-3">
                              <label for="Input4" class="form-label">Price</label>
                              <input type="number" class="form-control" id="Input4" name="price" min="0" placeholder="$">
                            </div>
                            <div class="mb-3">
                              <label for="Input5" class="form-label">Discount</label>
                              <input type="number" class="form-control" id="Input5" name="discount" min="0" placeholder="%">
                            </div>
                            <div class="mb-3">
                              <label for="Input6" class="form-label">In stock</label>
                              <input type="number" class="form-control" id="Input6" name="in_stock" min="0" placeholder="In tock">
                            </div>
                            <div class="mb-3">
                              <label for="Input7" class="form-label">Options EN</label>
                              <input type="text" class="form-control" id="Input7" name="options_en" min="0" placeholder="Brand - Nike, Color - white, etc...">
                            </div>
                            <div class="mb-3">
                              <label for="Input8" class="form-label">Options RU</label>
                              <input type="text" class="form-control" id="Input8" name="options_ru" min="0" placeholder="Brand - Nike, Color - white, etc...">
                            </div>
                            <div class="mb-3">
                                <label>Slider</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="slider" id="flexRadioDefault1" value="0" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Off
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="slider" id="flexRadioDefault2" value="1">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      On
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Input9" class="form-label">Slider image</label>
                                <input type="file" class="form-control" id="Input9" name="slider_img">
                            </div>
                            <div class="mb-3">
                                <label>Top</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="top" id="flexRadioDefault3" value="0" checked>
                                    <label class="form-check-label" for="flexRadioDefault3">
                                      Off
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="top" id="flexRadioDefault4" value="1">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                      On
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault5" value="1" checked>
                                    <label class="form-check-label" for="flexRadioDefault5">
                                      Active
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault6" value="0">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                      Hidden
                                    </label>
                                  </div>
                            </div>
                            <button type="submit" class="bttn bttn-dark">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection