@extends('edu.user.master')
@section('content')
    <div class="card">
        <div class="card-header">
            文章列表
        </div>
        <div class="card-body">
            <table class="table">

                @foreach($topics as $topic)
                    <tr>
                        <td scope="row">
                            <a href="{{route('edu.topic.show',$topic)}}">{{$topic['title']}}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    {!! $topics->links() !!}
@endsection