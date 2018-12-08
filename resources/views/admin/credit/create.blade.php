@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.credit.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                会员积分设置
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                    @foreach($credits as $k=>$credit)
                        <tr>
                            <td scope="row">
                                <input type="checkbox" name="credits[{{$k}}][status]"
                                       value="1" {{active_class($credit['status'],'checked')}}>
                            </td>
                            <td>{{$credit['name']}}
                                <input type="hidden" name="credits[{{$k}}][name]" value="{{$credit['name']}}">
                            </td>
                            <td>
                                @if($credit['system'])
                                    <input type="text" readonly class="form-control-plaintext" name="credits[{{$k}}][title]" value="{{$credit['title']}}">
                                @else
                                    <input type="text" class="form-control" name="credits[{{$k}}][title]"
                                           value="{{$credit['title']}}"
                                           required>
                                @endif
                            </td>
                            <td>
                                @if($credit['system'])
                                    <input type="text" readonly class="form-control-plaintext" name="credits[{{$k}}][unit]" value="{{$credit['unit']}}">
                                @else
                                    <input type="text" class="form-control" name="credits[{{$k}}][unit]"
                                           value="{{$credit['unit']}}" required>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary btn-xs">保存提交</button>
            </div>
        </div>
    </form>
@endsection