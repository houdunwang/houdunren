<div class="card">
    <div class="card-header">{{$title}}</div>
    <div class="tab-container">
        <ul role="tablist" class="nav nav-tabs">
            {{$nav}}
        </ul>
        @isset($header)
            <div class="card-header card-header-contrast card-header-divider p-1 pl-3 pt-2 pr-5 ml-0 mr-0">
                {{$header}}
            </div>
        @endisset
        {{$body}}
    </div>
</div>
