<script>
    var yup = require('yup');

    @foreach($schemas as $name => $rules)
        @include('schema', ['name' => $name, 'rules' => $rules])
    @endforeach
</script>