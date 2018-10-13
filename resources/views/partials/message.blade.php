@if (isset($route['docs']['message']))
    <div class="alert alert-primary" role="alert">
        {!!$route['docs']['message']!!}
    </div>
@endif