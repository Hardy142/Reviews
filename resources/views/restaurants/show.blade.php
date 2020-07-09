@extends('layouts.app')

@section('content')

    <div class="section-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">{{ $restaurant->name }}</h1>
                    <p class="rest-single-location">
                        {{ $restaurant->city }} , {{ $restaurant->province_state }} {{ $restaurant->country }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-full section-full-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header">{{ __( 'Reviews' ) }}</h2>
                    <div class="rest-single-star-container">
                        <div class="rest-single-star-item rest-single-star-item-all" onclick="get_reviews(this)" data-stars="all">
                            {{ __( 'All' ) }}
                            <span class="rest-single-rating-count">{{ count( $restaurant->get_reviews ) }}</span>
                        </div>
                        <div class="rest-single-star-item" onclick="get_reviews(this)" data-stars="high">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>{{ __( ' - ' ) }}</span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="rest-single-rating-count">{{ count( $restaurant->get_ratings_count_high ) }}</span>
                        </div>
                        <div class="rest-single-star-item" onclick="get_reviews(this)" data-stars="med">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                            <span>{{ __( ' - ' ) }}</span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                            <span class="rest-single-rating-count">{{ count( $restaurant->get_ratings_count_med ) }}</span>
                        </div>
                        <div class="rest-single-star-item" onclick="get_reviews(this)" data-stars="low">
                            <i class="fas fa-star-half"></i>
                            <span>{{ __( ' - ' ) }}</span>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="rest-single-rating-count">{{ count( $restaurant->get_ratings_count_low ) }}</span>
                        </div>
                        <input
                            type="hidden"
                            id="rest-id"
                            name="rest-id"
                            value="{{ $restaurant->id }}">
                    </div>
                    <div id="rest-single-review-wrapper">

                        @foreach( $restaurant->get_reviews as $review )

                            <div class="rest-single-review-item">
                                <div class="rest-single-review-item-top">

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

                                    <span>{{ $review->created_at->format('F j, Y') }}</span>
                                </div>
                                <div class="rest-single-review-item-bottom">
                                    <div class="rest-single-review-author-container">
                                        <div class="rest-single-review-avatar">
                                            <img src="{{ $review->get_author->avatar }}" />
                                        </div>
                                        <div class="rest-single-review-author">
                                            {{ $review->get_author->name }}
                                        </div>
                                    </div>
                                    <div class="rest-single-review-text-container">
                                        <p class="rest-single-review-title">{{ $review->title }}</p>
                                        <p class="rest-single-review-messge">{!! nl2br( e( $review->description ) ) !!}</p>
                                        <div class="rest-single-text-overlay">{{ __( 'Read More' ) }}</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        window.onload = function() {

            var ratings = document.getElementsByClassName( 'rest-single-star-item' );

            for( var i = 0; i < ratings.length; i++ ) {

                var rating = ratings[ i ];

                rating.onclick = function() {

                    var value = this.getAttribute( 'data-stars' );

                    get_reviews( value );

                }

            }

        }

        function get_reviews(value) {

            var restID = document.getElementById( 'rest-id' ).value;

            $.ajax({
                type : 'get',
                url : '{{URL::to("/reviews")}}',
                data:{ 
                    'id': restID,
                    'value': value
                },
                success: function (data) {

                    var wrapper = '';

                    data.reviews.forEach(populate);

                    function populate(item, index){
                        
                        wrapper += '<div class="rest-single-review-item">';
                            wrapper += '<div class="rest-single-review-item-top">';

                                if( item.rating == 0.5 ) {

                                    wrapper += '<i class="fas fa-star-half"></i>';

                                }else if( item.rating == 1 ) {

                                    wrapper += '<i class="fas fa-star"></i>';

                                }else if( item.rating == 1.5 ) {

                                     wrapper += '<i class="fas fa-star"></i>';
                                     wrapper += '<i class="fas fa-star-half"></i>';
                                    
                                }else if( item.rating == 2 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    
                                }else if( item.rating == 2.5 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star-half"></i>';
                                    
                                }else if( item.rating == 3 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    
                                }else if( item.rating == 3.5 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star-half"></i>';
                                    
                                }else if( item.rating == 4 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    
                                }else if( item.rating == 4.5 ) {

                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star-half"></i>';
                                    
                                }else if( item.rating == 5 ) {
                                    
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';
                                    wrapper += '<i class="fas fa-star"></i>';

                                }

                            wrapper += '</div>';
                            wrapper += '<div class="rest-single-review-item-bottom">';
                                wrapper += '<div class="rest-single-review-author-container">';
                                    wrapper += '<div class="rest-single-review-avatar">';
                                        wrapper += '<img src="' + item.get_author.avatar + '" />';
                                    wrapper += '</div>';
                                    wrapper += '<div class="rest-single-review-author">';
                                        wrapper += item.get_author.name;
                                    wrapper += '</div>';
                                wrapper += '</div>';
                                wrapper += '<div class="rest-single-review-text-container">';
                                    wrapper += '<p class="rest-single-review-title">' + item.title + '</p>';
                                    wrapper += '<p class="rest-single-review-messge">' + item.description + '</p>';
                                    wrapper += '<div class="rest-single-text-overlay">Read More</div>';
                                wrapper += '</div>';
                            wrapper += '</div>';
                        wrapper += '</div>';

                    }

                    document.getElementById("rest-single-review-wrapper").innerHTML = wrapper;

                    // Checking Review Read mores
                    $( '.rest-single-review-text-container' ).each(function(){

                        if( $( this ).find( '.rest-single-review-messge' ).height() < $( this ).height() ) {

                            $( this ).find( '.rest-single-text-overlay' ).css( 'display', 'none' );

                        }

                    });

                    $( '.rest-single-text-overlay' ).click(function(){

                        if( $( this ).parents( '.rest-single-review-item' ).hasClass( 'rest-single-review-item-expanded' ) ) {

                            $( this ).parents( '.rest-single-review-item' ).removeClass( 'rest-single-review-item-expanded' );

                        }else {

                            $( this ).parents( '.rest-single-review-item' ).addClass( 'rest-single-review-item-expanded' );

                        }

                    });

                    $( '.rest-single-review-item' ).each(function(){
                            
                        $( this ).animate({
                            'opacity': 1
                        }, 1200);
                
                    });
                                
                }
            });

        }

    </script>

@endsection