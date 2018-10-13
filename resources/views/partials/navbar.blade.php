<nav id="navbar-example3" class="navbar navbar-light bg-light">
    <nav class="nav nav-pills flex-column">
        @foreach ($docu as $hash => $block)
            <a class="top-level nav-link" href="#item-{{$loop->iteration}}">{{$block['controller']}}</a>
            <nav class="nav nav-pills flex-column" style="display:none">
                @foreach($block['routes'] as $route)
                    <a class="nav-link ml-3 my-1" href="#item-{{$loop->parent->iteration}}-{{$loop->iteration}}">
                        {{$route['uri']}}
                    </a>
                @endforeach
            </nav>
        @endforeach
    </nav>
</nav>