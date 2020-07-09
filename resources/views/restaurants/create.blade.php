@extends('layouts.app')

@section('content')

    <div class="section-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">{{ __( 'Add A Restaurant' ) }}</h1>
                    <form method="POST" action="{{ url( '/restaurants' ) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name">

                                @error('name')

                                    <div class="alert alert-light" role="alert">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name">Location</label>
                                <input
                                    type="text"
                                    id="city-selector"
                                    class="form-control"
                                    name="city-selector"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="name">Featured Image</label>
                                <div class="avatar-preview-wrapper">
                                    <div class="avatar-preview-container">
                                        <img id="avatar-preview" />
                                    </div>
                                    <div class="avatar-preview-input">
                                        <input
                                            type="file"
                                            id="featured_image"
                                            class="form-control @error('featured_image') is-invalid @enderror"
                                            name="featured_image"
                                            onchange="readURL(this)">

                                        @error('nafeatured_image')

                                            <div class="alert alert-light" role="alert">
                                                {{ $message }}
                                            </div>

                                        @enderror
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input 
                                    type="hidden"
                                    id="country"
                                    name="country">
                                <input 
                                    type="hidden"
                                    id="province_state"
                                    name="province_state">
                                <input 
                                    type="hidden"
                                    id="city"
                                    name="city">
                                <button type="submit" class="button-primary">{{ __( 'Add Restaurant' ) }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        function readURL(input) {
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#avatar-preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        

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

                document.getElementById('country').value = place.address_components[3].long_name;
                document.getElementById('province_state').value = place.address_components[2].long_name;
                document.getElementById('city').value = place.address_components[0].long_name;
                
            }
		}

		google.maps.event.addDomListener(window, 'load', initialize);

    </script>

@endsection