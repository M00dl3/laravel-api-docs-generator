@if ($route['middleware'])
    <div class="row mb-4">
        <div class="col-md-12">
            <strong>Middleware</strong>
            <div class="bg-light mt-2 py-4 px-3">
                <table>
                    @foreach($route['middleware'] as $middleware)
                        <tr>
                            <td><strong>- {{$middleware}}</strong></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endif