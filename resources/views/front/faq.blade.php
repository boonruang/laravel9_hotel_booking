@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>FAQ</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">

                    @foreach ($faq_all as $item)

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="{{$item->id}}">
                        <button class="accordion-button @if ($loop->iteration != 1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="{{($loop->iteration == 1 ) ? true : false}}" aria-controls="collapse{{$item->id}}">
                            {{$item->question}}
                        </button>
                        </h2>
                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse {{($loop->iteration == 1 ) ? 'show' : ''}}" aria-labelledby="{{$item->id}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!!$item->answer!!}
                            </div>
                        </div>
                    </div>

                    @endforeach                    

                </div>
            </div>
        </div>
    </div>
</div>

@endsection