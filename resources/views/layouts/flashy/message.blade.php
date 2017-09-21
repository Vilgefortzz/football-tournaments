
{{-- Normal flash messages--}}

@if(Session::has('flashy_notification.message'))
    <script id="flashy-template" type="text/template">
        <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
            <div class="flashy__body"></div>
        </div>
    </script>

    <script>
        flashy("{{ Session::get('flashy_notification.message') }}");
    </script>
@endif

{{-- Flash messages connected with validation --}}

{{-- Register/Login --}}

@if ($errors->has('username'))
    <script id="flashy-template" type="text/template">
        <div class="flashy flashy--error">
            <div class="flashy__body"></div>
        </div>
    </script>

    <script>
        flashy("{{ $errors->first('username') }}");
    </script>
@endif

@if ($errors->has('password'))
    <script id="flashy-template" type="text/template">
        <div class="flashy flashy--error">
            <div class="flashy__body"></div>
        </div>
    </script>

    <script>
        flashy("{{ $errors->first('password') }}");
    </script>
@endif

{{-- Create new club --}}

@if ($errors->has('club_name'))
    <script id="flashy-template" type="text/template">
        <div class="flashy flashy--error">
            <div class="flashy__body"></div>
        </div>
    </script>

    <script>
        flashy("{{ $errors->first('club_name') }}");
    </script>
@endif