/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

jQuery(function($){

    

    $(document).ready(function(){
        
        // Homepage Fadein
        $( '.register-wrapper, .banner-text-wrapper' ).fadeIn(1200);

        $( '.rest-single-review-item' ).each(function(){
            
            $( this ).css( 'opacity', 1 );

        });

        // Rating Inptu Slider
        $( '#rating' ).on( 'input', function(){

            switch( $( this ).val() ) {

                case '0.5':
                    $( '#rating-icon' ).html( '<i class="fas fa-sad-tear"></i>' );
                    $( '#rating-stars' ).html( '<i class="fas fa-star-half"></i>' );
                    break;

                case '1':
                    $( '#rating-icon' ).html( '<i class="fas fa-sad-tear"></i>' );
                    $( '#rating-stars' ).html( '<i class="fas fa-star"></i>' );
                    break;

                case '1.5':
                    $( '#rating-icon' ).html( '<i class="fas fa-frown-open"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star-half"></i>' 
                    );
                    break;

                case '2':
                    $( '#rating-icon' ).html( '<i class="fas fa-frown-open"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' +
                        '<i class="fas fa-star"></i>'
                    );
                    break;

                case '2.5':
                    $( '#rating-icon' ).html( '<i class="fas fa-frown-open"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star-half"></i>'
                    );
                    break;

                case '3':
                    $( '#rating-icon' ).html( '<i class="fas fa-meh"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>'
                    );
                    break;

                case '3.5':
                    $( '#rating-icon' ).html( '<i class="fas fa-meh"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star-half"></i>'
                    );
                    break;

                case '4':
                    $( '#rating-icon' ).html( '<i class="fas fa-grin"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>'
                    );
                    break;

                case '4.5':
                    $( '#rating-icon' ).html( '<i class="fas fa-grin"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star-half"></i>'
                    );
                    break;

                case '5':
                    $( '#rating-icon' ).html( '<i class="fas fa-grin-stars"></i>' );
                    $( '#rating-stars' ).html(
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>' + 
                        '<i class="fas fa-star"></i>'
                    );
                    break;

            }
                
        });

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

    });

});
