{{-- jQuery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- Bootstrap --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

{{-- Optional --}}
<script src="/components/font-awesome/js/all.js"></script>
<script src="/components/owl-carousel/js/owl.carousel.min.js"></script>

{{-- Custom js --}}
<script src="/js/main.js"></script>

{{-- Custome js with blade --}}
@if (session()->get('user'))
    <script>
        $(function(){
            // Setup ajax csrf
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post("{{ route('ajax.request.getusernotifications') }}", function(data){
                var notificBell = $('.notifications-bell');
                var notificPlace = $('.notifications-bell .dropdown-menu');
                var messages = [];
                
                if(data.length < 1){
                    notificPlace.html('<li><div class="color_5 font_size_10 mt-1">No messages yet.</div></li>');
                }else{
                    for(i = 0; i < data.length; i++){
                        messages += '<li><b>' + data[i]['header'] + '</b><a href="#" class="remove-notify"><i class="fas fa-times"></i></a><div class="font_size_12 mt-2">' + data[i]['content'] + '</div><div class="color_5 font_size_13 mt-1">' + data[i]['date'] + '</div></li>';
                    }
                    notificPlace.html(messages);
                    notificBell.append('<span class="notifications-num">' + data.length + '</span>')
                }
                
            });
        })
    </script>
@endif