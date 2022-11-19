@extends('admin.layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('heading','Add Room')

@section('right_top_button')  
<a href="{{route('admin_room_view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_room_store')}}" method="post" enctype="multipart/form-data">
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
                                <input id="image" type="file" name="featured_photo" >
                            </div>  
                            <div class="mb-4">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="form-control h_100" cols="30" rows="10">{{old('description')}}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Price *</label>
                                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Total room *</label>
                                <input type="text" class="form-control" name="total_rooms" value="{{old('total_rooms')}}">
                            </div>
                            <div class="mb-4">
                                <div class="form-label">Amenities</div>
                                @php $i=0; @endphp
                                @foreach($all_amenities as $item)
                                @php $i++; @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="defaultCheck{{$i}}" name="arr_amenities[]">
                                    <label class="form-check-label" for="defaultCheck{{$i}}">
                                        {{$item->name}}
                                    </label>
                                </div>
                                @endforeach                                    
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Room Size</label>
                                <input type="text" class="form-control" name="size" value="{{old('size')}}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Beds</label>
                                <input type="text" class="form-control" name="total_beds" value="{{old('total_beds')}}">
                            </div>                            
                            <div class="mb-4">
                                <label class="form-label">Bathrooms</label>
                                <input type="text" class="form-control" name="total_bathrooms" value="{{old('total_bathrooms')}}">
                            </div>                            
                            <div class="mb-4">
                                <label class="form-label">Balconies</label>
                                <input type="text" class="form-control" name="total_balconies" value="{{old('total_balconies')}}">
                            </div>                            
                            <div class="mb-4">
                                <label class="form-label">Guests</label>
                                <input type="text" class="form-control" name="total_guests" value="{{old('total_guests')}}">
                            </div>                            
                            <div class="mb-4">
                                <label class="form-label">Video Id</label>
                                <input type="text" class="form-control" name="video_id" value="{{old('video_id')}}">
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