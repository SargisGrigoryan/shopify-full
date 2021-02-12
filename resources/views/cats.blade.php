@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="categories" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">Categories</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Headline end -->

        <!-- Content -->
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 mb-3">
                        <form action="addCat" method="POST">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-text">Add new cat.</span>
                                <input type="text" aria-label="name_en" class="form-control" placeholder="In English" name="name_en">
                                <input type="text" aria-label="name_ru" class="form-control" placeholder="In Russian" name="name_ru">
                                <button type="submit" class="bttn bttn-dark mt-0">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        @if (count($cats) > 0)
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Used</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($cats as $cat)
                                    <tr>
                                        <th scope="row">{{ $cat->id }}</th>
                                        <td>{{ $cat->name_en }}</td>
                                        <td>
                                            <?php
                                                $counter = 0;
                                                foreach ($used_cats as $used_cat) {
                                                    if($used_cat->cat_id == $cat->id){
                                                        $counter++;
                                                    }
                                                }
                                                echo $counter;  
                                            ?>
                                        </td>
                                        <td>{{ $cat->status==1?'Active':'Blocked' }}</td>
                                        <td>
                                            @if ($cat->status != 0)
                                                <a href="/blockCat/{{ $cat->id }}" class="bttn bttn-dark mt-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"><i class="fas fa-ban"></i></a>
                                            @elseif($cat->status != 1)
                                                <a href="/recoverCat/{{ $cat->id }}" class="bttn bttn-dark mt-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Recover"><i class="fas fa-undo-alt"></i></a>
                                            @endif
                                            <a href="/removeCat/{{ $cat->id }}" class="bttn bttn-dark mt-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="fas fa-trash-alt"></i></a>
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
                        {{ $cats->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Pagination end -->
                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection