@extends('admin.layout.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('heading','Edit Room')

@section('right_top_button')  
<a href="{{route('admin_room_view')}}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_room_update',$room_data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img id="showImage" src="{{asset('uploads/rooms/'.$room_data->featured_photo)}}" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">New Photo *</label>
                                    <div>
                                        <input type="file" name="featured_photo" id="image">
                                    </div>
                                </div>                                
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{$room_data->name}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{!!$room_data->description!!}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Price *</label>
                                    <input type="text" class="form-control" name="price" value="{{$room_data->price}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total room *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{$room_data->total_rooms}}">
                                </div>
                                <div class="mb-4">
                                    <div class="form-label">Amenities</div>
                                    @php $i=0; @endphp
                                    @foreach($all_amenities as $item)

                                    @if(in_array($item->id, $existing_amenities))
                                        @php $checked_type = 'checked'  @endphp
                                    @else
                                        @php $checked_type = ''  @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="defaultCheck{{$i}}" name="arr_amenities[]" 
                                        {{-- @for ($j = 0; $j < count($existing_amenities); $j++)
                                        @php if($existing_amenities[$j] == $i) echo 'checked' @endphp
                                        @endfor --}}
                                        {{ $checked_type}}
                                        >
                                        <label class="form-check-label" for="defaultCheck{{$i}}">
                                            {{$item->name}}
                                        </label>
                                    </div>
                                    @endforeach                                    
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Room Size</label>
                                    <input type="text" class="form-control" name="size" value="{{$room_data->size}}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Beds</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{$room_data->total_beds}}">
                                </div>                            
                                <div class="mb-4">
                                    <label class="form-label">Bathrooms</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{$room_data->total_bathrooms}}">
                                </div>                            
                                <div class="mb-4">
                                    <label class="form-label">Balconies</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{$room_data->total_balconies}}">
                                </div>                            
                                <div class="mb-4">
                                    <label class="form-label">Guests</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{$room_data->total_guests}}">
                                </div>                            
                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <div class="iframe-container1">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$room_data->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>         
                                <div class="mb-4">
                                    <label class="form-label">Video Id</label>
                                    <input type="text" class="form-control" name="video_id" value="{{$room_data->video_id}}">
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