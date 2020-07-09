@extends('layouts.app')

@section('content')

<div class="section-full">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header text-center">{{ __('Your Reviews') }}</h1>
                <div class="user-dashboard-reviews-wrapper">

                    @if ( count( $reviews ) )
                        
                        @foreach( $reviews as $review )

                            <div class="user-dashboard-review-item-wrapper">
                                <div class="user-dashboard-review-item-rest-name">
                                    {{ $review->get_restaurant->name }}<br>
                                    <span>{{ $review->get_restaurant->city }} , {{ $review->get_restaurant->province_state }} {{ $review->get_restaurant->country }}</span>
                                </div>
                                <div class="user-dashboard-review-item">
                                    <div class="user-dashboard-review-image" style="background:url('{{ $review->get_restaurant->featured_image }}')">
                                    </div>
                                    <div class="user-dashboard-review-text-container">
                                        <p class="user-dashboard-review-header">{{ $review->title }}</p>
                                        <p class="user-dashboard-review-location">{{ $review->created_at->format('F j, Y') }}</p>
                                        
                                        @if( $review->rating == 0.5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star-half"></i>
                                            </p>

                                        @elseif( $review->rating == 1 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                            </p>

                                        @elseif( $review->rating == 1.5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </p>

                                        @elseif( $review->rating == 2 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>

                                        @elseif( $review->rating == 2.5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </p>

                                        @elseif( $review->rating == 3 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>

                                        @elseif( $review->rating == 3.5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </p>

                                        @elseif( $review->rating == 4 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>

                                        @elseif( $review->rating == 4.5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </p>

                                        @elseif( $review->rating == 5 )

                                            <p class="user-dashboard-review-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </p>

                                        @endif

                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @else
                        
                        <p>You currently have no reviews, why don't you make one?</p>

                    @endif

                </div>

                @if ( count( $reviews ) )

                    <div class="pagination-wrapper">
                        {{ $reviews->links() }}
                    </div>

                @endif

            </div>
        </div>
    </div>
</div>
<div class="section-full section-full-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">{{ __('Add Review') }}</h1>
                <form method="POST" action="{{ route('reviews.create') }}">
                    @csrf

                    <div id="add-review-restaurant-header">
                        {{ __('Find A Restaurant') }}
                    </div>
                    <div id="add-review-restaurant-content">
                        <div class="add-review-restaurant-form-controls">
                            <div class="add-review-restaurant-location">
                                <input 
                                    id="city-selector" 
                                    class="form-control" 
                                    type="text">
                            </div>
                            <div class="add-review-restaurant-search">
                                <input 
                                    id="restaurant-search" 
                                    class="form-control" 
                                    type="text"
                                    placeholder="Search Name"
                                    onkeyup="getRestaurantByName(this)">
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
                        <div id="add-review-restaurant-item-wrapper"></div>
                    </div>
                    <div id="add-review-review-container">
                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12">
                                <input 
                                    id="title" 
                                    class="form-control" 
                                    name="title"
                                    type="text"
                                    placeholder="Title"
                                    required
                                    autocomplete="title">

                                @error('title')

                                    <p class="help is-danger">{{ $error->first( 'title' ) }}</p>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-sm-12">
                                <textarea 
                                    id="review-description" 
                                    class="form-control" 
                                    name="description"
                                    placeholder="Message"
                                    required
                                    autocomplete="description"></textarea>

                                @error('description')

                                    <p class="help is-danger">{{ $error->first( 'description' ) }}</p>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-6 col-sm-12">
                                <div class="rating-input-container">
                                    <div class="rating-input-icon">
                                        <div id="rating-icon">
                                            <i class="fas fa-meh-blank"></i>
                                        </div>
                                        <div id="rating-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="rating-input-range">
                                        <input 
                                            id="rating" 
                                            type="range"
                                            name="rating"
                                            min="0.5"
                                            max="5"
                                            step="0.5"
                                            value="2.5">
                                    </div>
                                </div>
                                <div class="review-submit-container">
                                    <button type="submit" class="button-primary">{{ __('Submit Review') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input 
                        id="restaurant_id"
                        type="hidden"
                        name="restaurant_id"
                        value="">
                    <input 
                        id="user_id"
                        type="hidden"
                        name="user_id"
                        value="{{ Auth::user()->id }}">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">

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
                                '<div class="add-review-restaurant-item" onclick="getRestaurant(this)" data-id="' + item.id + '">' + 
                                    '<div class="add-review-restaurant-image" style="background:url(' + item.featured_image + ');"></div>' + 
                                    '<div class="add-review-restaurant-info-container">' + 
                                        '<p class="add-review-restaurant-name">' + item.name + '</p>' + 
                                        '<p class="add-review-restaurant-location">' + item.city + ', ' + item.province_state + ' ' + item.country + '</p>' + 
                                        '<div class="selected-check"><i class="fas fa-check-circle"></i></div>'
                                    '</div>' +  
                                '</div>';
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
        
        function getRestaurant(el) {
            
            $( '#restaurant_id' ).val( $( el ).attr('data-id') );

            $( '.add-review-restaurant-item' ).not( el ).each(function(){

                $( this ).css( 'display', 'none' );

            });

            $( el ).css( 'margin-bottom', 0 );

            $( el ).find('.selected-check').css( 'display', 'flex' );

            $( '#add-review-review-container' ).slideDown();

        }

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
                            '<div class="add-review-restaurant-item" onclick="getRestaurant(this)" data-id="' + item.id + '">' + 
                                '<div class="add-review-restaurant-image" style="background:url(' + item.featured_image + ');"></div>' + 
                                '<div class="add-review-restaurant-info-container">' + 
                                    '<p class="add-review-restaurant-name">' + item.name + '</p>' + 
                                    '<p class="add-review-restaurant-location">' + item.city + ', ' + item.province_state + ' ' + item.country + '</p>' + 
                                    '<div class="selected-check"><i class="fas fa-check-circle"></i></div>'
                                '</div>' +  
                            '</div>';
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