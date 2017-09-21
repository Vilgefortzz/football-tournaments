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

@if ($errors->has('name'))
    <script id="flashy-template" type="text/template">
        <div class="flashy flashy--error">
            <div class="flashy__body"></div>
        </div>
    </script>

    <script>
        flashy("{{ $errors->first('name') }}");
    </script>
@endif