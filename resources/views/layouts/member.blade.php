@include('layouts.member.'.(\Browser::isMobile()?'mobile':'pc'), ['user' => auth()->user()])
@stack('js')