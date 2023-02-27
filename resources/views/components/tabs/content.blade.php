@if(!isset($hasPreviousSession) || !$hasPreviousSession)
    <div class="tab-pane fade {{ isset($active) ? 'show active' : '' }} {{ isset($tab_class) ? $tab_class : '' }}" id="{{ $tab }}" role="tabpanel">@include($view)</div>
@else
    <div class="tab-pane fade  {{ Session::has($tab) ? 'show active' : '' }} {{ isset($tab_class) ? $tab_class : '' }}" id="{{ $tab }}" role="tabpanel">@include($view)</div>
@endif
