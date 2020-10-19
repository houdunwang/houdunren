@extends('layouts.module.system')

@section('content')
@include('article.field._nav',['model'=>$field['model']])
<article-field :id="{{ $field['id'] }}"></article-field>
@endsection
