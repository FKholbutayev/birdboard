
@if (count($activity->changes['after']) == 2)
    {{$activity->user->name}} updated the  {{ key($activity->changes['after']) }}
@else
    {{$activity->user->name}} updated the project
@endif
