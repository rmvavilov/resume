@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-md-offset-1">
                <div class="panel panel-default">
                    <ul class="list-group">
                        
                        @foreach ($contacts as $contact)
                            <li class="list-group-item"><i class="fa {{ $contact->icon_class }}"></i>&nbsp;
                                <a href="{{ $contact->href }}">{{ $contact->short_href }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection