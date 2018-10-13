<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{config('app.name')}} | Documentation</title>
    <link rel="stylesheet" href="/vendor/documentor/app.css?{{str_random(40)}}">
    <link rel="icon" href="/vendor/documentor/favicon.ico?{{str_random(40)}}" type="image/x-icon"/>
</head>
<body>
    <div class="jumbotron jumbotron-fluid bg-white">
        <div class="container text-center">
            <h1 class="display-4">{{config('documentor.title')}}</h1>
            <p class="lead">{{config('documentor.description')}}</p>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="sticky-top">
                    <div class="nav flex-column">
                        @include('docu::partials.navbar')
                    </div>
                </div>
            </div>
            <div class="col">
                @include('docu::partials.intro')
                <div data-spy="scroll" data-target="#navbar-example3" data-offset="0">
                    @foreach ($docu as $hash => $block)
                        <section class="controller">
                            <h2 id="item-{{$loop->iteration}}">
                                {{$block['controller']}}
                                <hr>
                            </h2>
                            @foreach($block['routes'] as $route)
                                <h4 class="mb-2" id="item-{{$loop->parent->iteration}}-{{$loop->iteration}}">
                                    <strong>{{$route['http']}}</strong> - {{$route['uri']}}
                                </h4>
                                @include('docu::partials.summery')
                                @include('docu::partials.message')
                                @include('docu::partials.middleware')
                                @include('docu::partials.validation')
                            @endforeach
                        </section>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-4">
        <div class="container text-center">
            <span class="text-muted">
                Create by <a href="https://github.com/jurrid/laravel-api-docs-generator" target="_blank">Documenter</a>
            </span>
        </div>
    </footer>
</body>
<script src="/vendor/documentor/app.js?{{str_random(40)}}" ></script>
</html>