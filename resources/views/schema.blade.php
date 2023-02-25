let {name} = yup.object({
    @foreach ($rules as $name => $rule)
        {{ $name }}: '{{ $rule }}',
    @endforeach
});