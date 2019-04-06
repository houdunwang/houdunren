<a class="mb-0 mr-2" href="{{route('member.mail.index')}}">
    <i class="fa fa-envelope {{active_class($user['email'],'text-info')}}"></i>
</a>
<a class="mb-0 mr-2" href="{{route('member.info.index')}}">
    <i class="fa fa-weibo {{active_class($user['weibo'],'text-info')}}"></i>
</a>
<a class="mb-0 mr-2" href="{{route('member.info.index')}}">
    <i class="fa fa-github {{active_class($user['github'],'text-info')}}"></i>
</a>
<a class="mb-0 mr-2" href="{{route('member.info.index')}}">
    <i class="fa fa-qq {{active_class($user['qq'],'text-info')}}"></i>
</a>