@extends('layouts.module.system')

@section('content')
@include('article.field._nav',['model'=>$field['model']])
<article-field :model_id="{{ $field['model_id'] }}" :id="{{ $field['id'] }}"></article-field>
@endsection