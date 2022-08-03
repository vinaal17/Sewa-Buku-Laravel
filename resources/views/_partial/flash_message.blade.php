@if (Session::has('flash_message'))
    <div class="alert alert-success {{ Session::has('penting')? 'alret-important' : ''}}">
        {{ Session::get('flash_message') }}
</div>
@endif