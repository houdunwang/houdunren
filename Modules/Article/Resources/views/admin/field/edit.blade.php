@extends('layouts.module.admin')

@section('content')
@include('article::admin.field._nav',['model'=>$field['model']])
<article-field :model_id="{{ $field['model_id'] }}" :id="{{ $field['id'] }}"></article-field>
@endsection
