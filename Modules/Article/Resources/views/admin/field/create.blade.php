@extends('layouts.module.admin')

@section('content')
@include('article::admin.field._nav')
<article-field :model_id="{{ $model['id'] }}"></article-field>
@endsection
