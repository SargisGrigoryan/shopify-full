@extends('layouts')

@section('content')

    <!-- Register -->
    <section id="allNotifications" class="padding_center_2">

        <!-- Headline -->
        <div class="headline padding_bottom_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="font_size_3">All notifications</div>
                        <p>Please update page for getting new notifications.</p>
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
                          <tbody>

                            @foreach ($notifics as $item)
                                {{-- Notification --}}
                                <tr>
                                    <td>
                                        <b><i>{{ $item->header }}</i></b>
                                        <div class="mt-2">{{ $item->content }}</div>
                                        <div class="color_5 font_size_12 mt-2">{{ $item->date }}</div>
                                    </td>
                                </tr>
                                {{-- Notification end --}}
                            @endforeach

                          </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        @if (count($notifics) > 0)
                            <div class="color_5 font_size_10">{{ count($notifics) }} - notifications are found.</div>
                        @else
                            <hr>
                            <div class="font_size_7 color_5 text-center">No result is found</div>
                        @endif
                    </div>

                    <!-- Pagination -->
                    <div class="col-12 text-center mt-3">
                        {{ $notifics->links('vendor.pagination.custom') }}
                    </div>
                    <!-- Pagination end -->

                </div>
            </div>
        </div>
        <!-- Content end -->
    </section>
    <!-- Register end -->
    
@endsection