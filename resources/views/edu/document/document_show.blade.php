@extends('edu.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action rounded-0">
                        <span class="text-muted font-weight-bold btn captcha">
                            {{$document['title']}}
                        </span>
                    </div>
                    @foreach($document->chapter as $chapter)
                        <div class="card mb-2">
                            <div class="card-header p-4">
                                <div class="card-header border-0 pt-0 pl-0" style="font-size: 14px;">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    {{$chapter->title}}
                                </div>
                                @foreach($chapter->section as $section)
                                    <div class="card mb-2">
                                        <div class="card-body pl-4 pt-2 pb-2" style="font-size: 14px;">
                                            <a href="{{route('edu.section.show',$section)}}" class="text-dark section">
                                                <i class="fa fa-file-o"></i>
                                                {{$section->title}}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .chapter, .section {
            display: block;
            width: 75%;
            float: left;
            overflow: auto;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endpush
