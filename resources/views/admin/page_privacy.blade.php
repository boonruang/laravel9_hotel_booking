@extends('admin.layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('heading','Edit Terms and Conditions Page')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_page_privacy_update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="mb-4">
                                    <div></div>
                                    <label class="form-label">Privacy Heading *</label>
                                    <input type="text" class="form-control" name="privacy_heading" value="{{$page_data->privacy_heading}}">
                                </div>                                
                                <div class="mb-4">
                                    <label class="form-label">Privacy Content *</label>
                                    <textarea name="privacy_content" class="form-control snote" cols="30" rows="10">{{$page_data->privacy_content}}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <select name="privacy_status" class="form-control">
                                        <option value="1" @if ($page_data->privacy_status == 1) selected  @endif>Show</option>
                                        <option value="0" @if ($page_data->privacy_status == 0) selected  @endif>Hide</option>
                                    </select>
                                </div>                                

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
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