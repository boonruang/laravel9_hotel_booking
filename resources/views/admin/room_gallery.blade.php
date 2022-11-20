@extends('admin.layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('heading','Room Gallery of '.$room_data->name)

@section('right_top_button')  
<a href="{{route('admin_room_view')}}" class="btn btn-primary"><i class="fa fa-eye"></i>Back to preview</a>
@endsection

@section('main_content')
<div class="section-body">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_room_gallery_store',$room_data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="mb-3">
                                    <img id="showImage" class="rounded" style="width:200px" src="{{url('uploads/no_image.jpg') }}" alt="Card image cap">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Photo *</label>
                                </div>
                                <input id="image" type="file" name="photo" >
                            </div>  
                            
                            <div class="mb-4">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example1">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($room_photos as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('uploads/rooms/'.$row->photo)}}" alt="" class="w_200">
                                </td>
                                <td class="pt_10 pb_10">
                                    <a href="{{route('admin_room_gallery_delete',$row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
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