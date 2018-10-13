@if ($route['validation'])
    <div class="row">
        <div class="col-md-12">
            <strong>Parameters</strong>
            <div class="bg-light mt-2 py-4 px-3">
                <table>
                    @foreach($route['validation'] as $param => $validation)
                        @if (is_array($validation))
                            @php
                                $validation = implode(', ', $validation)
                            @endphp
                        @endif
                        <tr>
                            <td><strong>{{$param}}</strong></td>
                            <td>&nbsp;|&nbsp;</td>
                            <td>{{$validation}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endif