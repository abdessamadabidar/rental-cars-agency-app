@props(['type'])
<div class="alert alert-{{$type}} session-alert" role="alert" style="z-index: 9999; width: 75%; margin-inline: auto; ">
    {{$slot}}
</div>
