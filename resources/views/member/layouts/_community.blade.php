<a class="mb-0 mr-2 {{active_class(!$user['weibo'],'text-secondary')}}" href="{{$user['weibo']}}">
    <i class="fa fa-weibo" aria-hidden="true"></i>
</a>
<a class="mb-0 mr-2 {{active_class(!$user['wechat'],'text-secondary')}}" href="{{$user['wechat']}}">
    <i class="fa fa-wechat" aria-hidden="true"></i>
</a>
<a class="mb-0 mr-2 {{active_class(!$user['github'],'text-secondary')}}" href="{{$user['github']}}">
    <i class="fa fa-github" aria-hidden="true"></i>
</a>
<a class="mb-0 mr-2 {{active_class(!$user['qq'],'text-secondary')}}" href="{{$user['qq']}}">
    <i class="fa fa-qq" aria-hidden="true"></i>
</a>
<a class="mb-0 mr-2 {{active_class(!$user['email'],'text-secondary')}}" href="mailto:{{$user['email']}}">
    <i class="fa fa-envelope" aria-hidden="true"></i>
</a>