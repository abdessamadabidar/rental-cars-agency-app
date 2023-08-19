@props(['type'])
<div class="alert alert-{{$type}} session-alert" role="alert">
    {{$slot}}
</div>
