@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_data->contact_heading}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                        <div class="mb-3">
                            <label for="form-control">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="form-control">Email Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="form-control">Message</label>
                            <textarea type="text" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                        </div>                    
                </div>
            </div>            
            <div class="col-lg-6 col-md-12">
                <div class="map">
                {!! $page_data->contact_map !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection