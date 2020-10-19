@extends('layouts.module.system')

@section('content')
@include('article.field._nav')
<article-field :model_id="{{ $model['id'] }}"></article-field>
@endsection
