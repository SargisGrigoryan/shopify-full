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

            // Call functions
            updateWishlist();

            // Get user messages with ajax
            setInterval(function(){
                $.post("{{ route('ajax.request.getusernotifications') }}", function(data){
                    var notificBell = $('.notifications-bell');
                    var notificPlace = $('.notifications-bell .dropdown-menu');
                    var messages = [];
                    
                    if(data.length < 1){
                        notificPlace.html('<li><div class="color_5 font_size_10 mt-1">No messages yet.</div></li>');
                    }else{
                        var counter = 0;
                        for(i = 0; i < data.length; i++){
                            messages += '<li><b>' + data[i]['header'] + '</b><button type="button" class="remove-notify" data-id="' + data[i]['id'] + '"><i class="fas fa-times"></i></button><div class="font_size_12 mt-2">' + data[i]['content'] + '</div><div class="color_5 font_size_13 mt-1">' + data[i]['date'] + '</div></li>';
                            if(data[i]['status'] == '0'){
                                counter++;
                            }
                        }
                        if(counter != 0){
                            notificBell.append('<span class="notifications-num">' + counter + '</span>')
                        }else{
                            notificBell.find('.notifications-num').remove();
                        }
                        notificPlace.html(messages);
                    }
                    notificPlace.append('<li><a href="/allNotifications">See all notifications</a></li>');
                });
            }, 1000)

            // Remove user message
            $('body').on('click', '.remove-notify', function(){
                var target = $(this).data('id');
                $.ajax({
                    url: "{{ route('ajax.request.removemessage') }}",
                    type: "POST",
                    data: {target: target}
                })
            });

            // Add to cart form
            $('form#addToCart').on('submit', function(e){
                e.preventDefault();

                var productId = $(this).find('input[name="product_id"]').val();
                var qty = $(this).find('input[name="qty"]').val();

                $.ajax({
                    url: "{{ route('ajax.request.addtocart') }}",
                    type: "POST",
                    data: {product_id: productId, qty: qty},
                    success: function(data){

                        // Check if isset message from back end
                        if(data.notify_type != '' && data.notify_message != ''){
                            var type = data.notify_type;
                            var message = data.notify_message;
                            notify(type, message);
                        }

                        // Check if isset reload
                        if(data.reload != ''){
                            if(data.reload == 'true'){
                                location.reload();
                            }else{
                                window.location.replace("/" + data.reload);
                            }
                        }
                        
                    }
                })
            }); 

            // Wishlist
            $('form#wishlist').on('submit', function(e){
                e.preventDefault();

                var productId = $(this).find('input[name="product_id"]').val();

                $.ajax({
                    url: "{{ route('ajax.request.wishlist') }}",
                    type: "POST",
                    data: {product_id: productId},
                    success: function(data){

                        // Get response from server
                        if(data.data != ''){
                            var productId = data.data;
                            productsArray = [];
                            productsObj = {};
                            // Check local storage
                            var wishlist = window.localStorage.getItem('wishlist');
                            if(wishlist != null){
                                productsArray = JSON.parse(wishlist);
                                productsObj = productId;
                                
                                // Check if product is already added then remove
                                if($.inArray(productId, productsArray) != -1){
                                    productsArray.splice(productsArray.indexOf(productId), 1);
                                    window.localStorage.removeItem('wishlist');
                                    window.localStorage.setItem('wishlist', JSON.stringify(productsArray));

                                    // Response user
                                    notify('success', 'Product was successfully removed from wishlist.');
                                }else{
                                    productsArray.push(productsObj);
                                    window.localStorage.removeItem('wishlist');
                                    window.localStorage.setItem('wishlist', JSON.stringify(productsArray));

                                    // Response user
                                    notify('success', 'Product was successfully added to wishlist.');
                                }
                            }else{
                                productsObj = productId;
                                productsArray.push(productsObj);
                                window.localStorage.setItem('wishlist', JSON.stringify(productsArray));

                                // Response user
                                notify('success', 'Product was successfully added to wishlist.');
                            }
                        }

                        // Update wishlist
                        updateWishlist();

                        // Check if isset message from back end
                        if(data.notify_type != '' && data.notify_message != ''){
                            var type = data.notify_type;
                            var message = data.notify_message;
                            notify(type, message);
                        }

                        // Check if isset reload
                        if(data.reload != ''){
                            if(data.reload == 'true'){
                                location.reload();
                            }else{
                                window.location.replace("/" + data.reload);
                            }
                        }
                        
                    }
                })
            }); 

            // Notifications seen by user
            var myDropdown = $('#dropdown-notifs');
            myDropdown.on('show.bs.dropdown', function () {
                $.post("{{ route('ajax.request.notifisseen') }}");
            })
        })

        // Update wishlist function
        function updateWishlist(){
            // Get wishlist from local storage
            var wishlist = JSON.parse(window.localStorage.getItem('wishlist'));
            
            $.ajax({
                url: "{{ route('ajax.request.updatewishlist') }}",
                type: "POST",
                data: {wishlist: wishlist},
                success: function(data){

                    // Get response from server
                    var wishlistHeart = $('.wishlist-heart');
                    var showPlace = $('.wishlist-heart .dropdown-menu');
                    var products = [];
                    
                    if(data.length < 1){
                        showPlace.html('<li><div class="color_5 font_size_10 mt-1">No wished products yet.</div></li>');
                        wishlistHeart.find('.wishist-num').remove();
                    }else{
                        var counter = 0;
                        for(i = 0; i < data.length; i++){
                            products += '<li><img src="' + data[i]['img'] + '" alt="Image" class="wishlist-image"><b>' + data[i]['name_en'] + '</b><button type="button" class="remove-wished" data-id="' + data[i]['id'] + '"><i class="fas fa-trash"></i></button></li>';
                            counter++;
                        }
                        if(counter != 0){
                            wishlistHeart.append('<span class="wishist-num">' + counter + '</span>')
                        }else{
                            wishlistHeart.find('.wishist-num').remove();
                        }
                        showPlace.html(products);
                    }

                    // Update wishlist buttons
                    wihlistButtonUpdate();
                }
            })
        }

        // Update all wishlist buttons
        function wihlistButtonUpdate () {
            console.log('I worked');
            // Get products ids from local storage
            var wishlist = JSON.parse(window.localStorage.getItem('wishlist'));
            // Reset all wished buttons
            $('.bttn-wished').html('<i class="far fa-heart"></i>');
            $('.bttn-wished').removeClass('bttn-wished');
            for(i = 0; i < wishlist.length; i++){
                // Update all wishlist buttons
                $('.bttn-wshlist[data-id="' + wishlist[i] + '"]').addClass('bttn-wished');
                $('.bttn-wshlist[data-id="' + wishlist[i] + '"]').html('<i class="fas fa-heart"></i>');
            }
        }

    </script>
@endif