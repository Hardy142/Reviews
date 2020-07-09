@extends('layouts.app')

@section('content')

<div id="home-header-container">
    <div id="header-background-fill">
        <div class="banner-left">
            <div class="banner-text-wrapper">
                <h1 class="home-banner-text">
                    {{ __('All') }}<br>
                    <span>{{ __('Restaraunt Reviews') }}</span><br>
                    {{ __('In One Place') }}
                </h1>
            </div>
        </div>
        <div class="banner-right">
            <div class="register-wrapper">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" >{{ __('Name') }}</label>
                            <input 
                                id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="password">{{ __('Password') }}</label>
                            <input 
                                id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                            <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="submit" class="button-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="mobile-register-container">
    <div class="section-full section-full-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header text-center">{{ __( 'Register' ) }}</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name" >{{ __('Name') }}</label>
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password">{{ __('Password') }}</label>
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                <input 
                                    id="password-confirm" 
                                    type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="button-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="latest-reviews-container" class="section-full">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center page-header">{{ __('Latest Reviews') }}</h1>

                @if( count( $reviews ) )

                    <div class="homepage-reviews-wrapper">

                        @foreach( $reviews as $review )
                            
                            <div class="homepage-review-item" onclick="redirectToRestaurant(this)" data-id="{{ $review->get_restaurant->id }}">
                                <div class="review-rest-image" style="background:url('{{ $review->get_restaurant->featured_image }}')">
                                </div>
                                <div class="review-location-info">
                                    <p class="review-location-name">{{ $review->get_restaurant->name }}</p>
                                    <p class="review-location-location">{{ $review->get_restaurant->city }} , {{ $review->get_restaurant->province_state }} {{ $review->get_restaurant->country }}</p>
                                </div>
                                <div class="review-star-container">

                                    @if( $review->rating == 0.5 )

                                        <i class="fas fa-star-half"></i>

                                    @elseif( $review->rating == 1 )

                                        <i class="fas fa-star"></i>

                                    @elseif( $review->rating == 1.5 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>

                                    @elseif( $review->rating == 2 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>

                                    @elseif( $review->rating == 2.5 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>

                                    @elseif( $review->rating == 3 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>

                                    @elseif( $review->rating == 3.5 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>

                                    @elseif( $review->rating == 4 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>

                                    @elseif( $review->rating == 4.5 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>

                                    @elseif( $review->rating == 5 )

                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>

                                    @endif

                                </div>
                                <div class="review-author-info-container">
                                    <div class="review-author-avatar">
                                        <img src="{{ $review->get_author->avatar }}" />
                                    </div>
                                    <div class="review-author-message">
                                        <p class="review-author-message-title">{{ $review->title }}</p>
                                        <!--<p class="review-author-message-message"></p>-->
                                        <p class="review-author-message-date">{{ $review->created_at->format('F j, Y') }}</p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    
                    </div>

                @endif

            </div>
        </div>
    </div>
</div>
<div class="section-full  section-full-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header text-center">{{ __('Find A Restaurant') }}</h1>
                <div id="homepage-rest-search-wrapper" class="row">
                    <div class="home-rest-search col-md-5 col-sm-12">
                        {{ __( 'Search By Location' ) }}
                        <input 
                            id="city-selector" 
                            class="form-control home-rest-search-input" 
                            type="text">
                    </div>
                    <div class="home-rest-search-sep col-md-2 col-sm-12">
                        {{ __( 'OR' ) }}
                    </div>
                    <div class="home-rest-search col-md-5 col-sm-12">
                        {{ __( 'Search By Name' ) }}
                        <input 
                            id="restaurant-search" 
                            class="form-control home-rest-search-input" 
                            type="text"
                            placeholder="Search Name"
                            onkeyup="getRestaurantByName(this)">
                    </div>
                    <input 
                        type="hidden"
                        id="search_country"
                        name="search_country">
                    <input 
                        type="hidden"
                        id="search_province_state"
                        name="search_province_state">
                    <input 
                        type="hidden"
                        id="search_city"
                        name="search_city">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="add-review-restaurant-item-wrapper"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>

        function initialize() {

		    var options = {
		        types: ['(cities)'],
		        componentRestrictions: {country: ["can","usa"]}
		    };

		    var input = document.getElementById('city-selector');
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', fillInAddress);

            function fillInAddress() {
                // Get the place details from the autocomplete object.
                var place = autocomplete.getPlace();

                var searchTerm = '';

                document.getElementById('search_country').value = place.address_components[3].long_name;
                document.getElementById('search_province_state').value = place.address_components[2].long_name;
                document.getElementById('search_city').value = place.address_components[0].long_name;

                if(document.getElementById('restaurant-search') != null) {

                    searchTerm = document.getElementById('restaurant-search').value;

                }

                $.ajax({
                    type : 'get',
                    url : '{{URL::to("/restaurants")}}',
                    data:{ 
                        'country': place.address_components[3].long_name,
                        'province_state': place.address_components[2].long_name,
                        'city': place.address_components[0].long_name,
                        'name': searchTerm
                    },
                    success: function (data) {

                        document.getElementById('add-review-restaurant-item-wrapper').innerHTML = '';

                        data.restaurants.forEach(populate);
                        
                        function populate(item, index){

                            document.getElementById("add-review-restaurant-item-wrapper").innerHTML += 
                                '<a href="/restaurant-reviews/restaurants/' + item.id + '">' + 
                                    '<div class="add-review-restaurant-item">' + 
                                        '<div class="add-review-restaurant-image" style="background:url(' + item.featured_image + ');"></div>' + 
                                        '<div class="add-review-restaurant-info-container">' + 
                                            '<p class="add-review-restaurant-name">' + item.name + '</p>' + 
                                            '<p class="add-review-restaurant-location">' + item.city + ', ' + item.province_state + ' ' + item.country + '</p>' + 
                                            '<div class="selected-check"><i class="fas fa-check-circle"></i></div>'
                                        '</div>' +  
                                    '</div>' + 
                                '</a>';
                        }

                        $( '#add-review-restaurant-item-wrapper' ).slideDown();
                        
                        $( '.add-review-restaurant-item' ).each(function(){
                            
                            $( this ).animate({
                                'opacity': 1
                            }, 1200);
                    
                        });
                        
                    }
                });
                
            }
		}

		google.maps.event.addDomListener(window, 'load', initialize);

        function getRestaurantByName(el) {
            
            var searchName, searchCountry, searchProvinceState, searchCity;

            searchName = el.value;
            searchCountry = document.getElementById('search_country').value;
            searchProvinceState = document.getElementById('search_province_state').value;
            searchCity = document.getElementById('search_city').value;

            $.ajax({
                type : 'get',
                url : '{{URL::to("/restaurants")}}',
                data:{ 
                    'name': searchName,
                    'country': searchCountry,
                    'province_state': searchProvinceState,
                    'city': searchCity
                },
                success: function (data) {

                    document.getElementById("add-review-restaurant-item-wrapper").innerHTML = '';

                    data.restaurants.forEach(populate);
                    
                    function populate(item, index){

                        document.getElementById("add-review-restaurant-item-wrapper").innerHTML += 
                            '<a href="/restaurant-reviews/restaurants/' + item.id + '">' +
                                '<div class="add-review-restaurant-item">' + 
                                    '<div class="add-review-restaurant-image" style="background:url(' + item.featured_image + ');"></div>' + 
                                    '<div class="add-review-restaurant-info-container">' + 
                                        '<p class="add-review-restaurant-name">' + item.name + '</p>' + 
                                        '<p class="add-review-restaurant-location">' + item.city + ', ' + item.province_state + ' ' + item.country + '</p>' + 
                                        '<div class="selected-check"><i class="fas fa-check-circle"></i></div>'
                                    '</div>' +  
                                '</div>' + 
                            '</a>';
                    }

                    $( '#add-review-restaurant-item-wrapper' ).slideDown();

                    $( '.add-review-restaurant-item' ).each(function(){
                        
                        $( this ).animate({
                            'opacity': 1
                        }, 1200);
                
                    });
                    
                }
            });

        }

    </script>

@endsection