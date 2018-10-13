<div class="intro">
    <h2>
        Introduction
        <hr>
    </h2>
    <div class="bg-light mt-2 py-4 px-3 content">
        <table>
            <tr>
                <td><strong>Application</strong></td>
                <td>&nbsp;:&nbsp;</td>
                <td>{{config('documentor.title')}}</td>
            </tr>
            <tr>
                <td><strong>App Version</strong></td>
                <td>&nbsp;:&nbsp;</td>
                <td>{{config('documentor.version')}}</td>
            </tr>
            <tr>
                <td><strong>Author</strong></td>
                <td>&nbsp;:&nbsp;</td>
                @if (config('documentor.author_webpage'))
                    <td>
                        <a href="{{config('documentor.author_webpage')}}" target="_blanl">{{config('documentor.author')}}</a>
                    </td>
                @else
                    <td>{{config('documentor.author')}}</td>
                @endif
            </tr>
            <tr>
                <td><strong>Support Forum</strong></td>
                <td>&nbsp;:&nbsp;</td>
                @if (config('documentor.forum_webpage'))
                    <td>
                        <a href="{{config('documentor.forum_webpage')}}" target="_blanl">{{config('documentor.forum_webpage')}}</a>
                    </td>
                @endif
            </tr>
            <tr>
                <td><strong>License</strong></td>
                <td>&nbsp;:&nbsp;</td>
                @if (config('documentor.license_webpage'))
                    <td>
                        <a href="{{config('documentor.license_webpage')}}" target="_blanl">{{config('documentor.license')}}</a>
                    </td>
                @else
                    <td>{{config('documentor.license')}}</td>
                @endif
            </tr>
        </table>
    </div>
</div>
@if (config('documentor.requirements'))
<div class="requirements">
    <h2>
            Requirements
        <hr>
    </h2>
    <div class="bg-light py-4 px-3 content">
        <ul>
            @foreach (config('documentor.requirements') as $item)
                <li>{!!$item!!}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif