@if ($texto=Session::get('mensaje'))
<div class="my-3 alert alert-warning p2" role="alert">
    {{$texto}}
</div>
@endif
