@extends('layouts.app')

@section('content')

    <div class="section-full">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">{{ __( 'Change Profile Image' ) }}</h1>
                    <form method="POST" action="{{ url( '/profile/' . Auth::user()->id ) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="avatar-preview-wrapper">
                                    <div class="avatar-preview-container">
                                        <img id="user-avatar-img" class="user-av" src="{{ Auth::user()->avatar }}" />
                                    </div>
                                    <div class="avatar-preview-input">
                                        <input
                                            type="file"
                                            id="avatar"
                                            class="form-control"
                                            name="avatar"
                                            onchange="readURL(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="button-primary">{{ __( 'Change Avatar' ) }}</button>
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
                    $('#user-avatar-img').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection