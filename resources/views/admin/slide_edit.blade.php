@extends('admin.layout.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('heading','Edit Slide')

@section('right_top_button')  
<a href="{{route('admin_slide_view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_slide_update',$slide_data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img id="showImage" src="{{asset('uploads/slides/'.$slide_data->photo)}}" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Photo *</label>
                                    <div>
                                        <input type="file" name="photo" id="image">
                                    </div>
                                </div>                                
                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{$slide_data->heading}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Text</label>
                                    <textarea name="text" class="form-control h_100" cols="30" rows="10">{{$slide_data->text}}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" value="{{$slide_data->button_text}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" value="{{$slide_data->button_url}}">
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