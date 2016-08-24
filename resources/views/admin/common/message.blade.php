{{--Display status messages--}}

@if(Session::has('status'))
    <div class="status-message">
        @if (count(Session::get('status')) > 1)
            <div class="alert alert-success" style="margin: 1em 1em 0em 1em;">
                <ul>
                    @foreach (Session::get('status')->all() as $s)
                        <li>{{ $s }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="alert alert-success" style="margin: 1em 1em 0em 1em;">
                <ul>
                    <li>{{ Session::get('status') }}</li>
                </ul>
            </div>
        @endif
    </div>
@endif

{{--Display errors--}}

@if (count($errors) > 0)
    <div class="status-message">
        <div class="alert alert-error" style="margin: 1em 1em 0em 1em;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif