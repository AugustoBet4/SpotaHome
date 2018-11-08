@if(Session::has('info'))
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">
    &times;
</button>
{{ Session::get('info') }}
</div>
@endif