@extends('admin.layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('heading','Edit Testimonial')

@section('right_top_button')  
<a href="{{route('admin_testimonial_view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_testimonial_update',$testimonial_data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img id="showImage" class="rounded" style="width:200px" src="{{asset('uploads/testimonials/'.$testimonial_data->photo) }}" alt="Card image cap">
                                    </div>
                                </div>
                               <div class="mb-4">
                                    <label class="form-label">New Photo *</label>
                                    <input id="image" type="file" name="photo" >
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{$testimonial_data->name}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Disignation *</label>
                                    <input name="designation" class="form-control" value="{{$testimonial_data->designation}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Comment *</label>
                                    <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{$testimonial_data->comment}}</textarea>
                                </div>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>  
@endsection