@extends('admin.layout.app')

@section('heading','View Subscriber')

@section('right_top_button')  
<a href="{{route('admin_testimonial_add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_subscribers as $row)
                                    
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->email}}</td>
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
@endsection