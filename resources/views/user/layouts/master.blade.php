@include('user.layouts.'.(\Browser::isMobile()?'pc':'pc'), ['user' => $user])
@stack('js')