<select class="js-example-basic-multiple gender-multi" name="{{$name}}[]" multiple="multiple">
    @foreach($options as $opt)
        <option value="{{ strtolower($opt) }}">{{ $opt }}</option>
    @endforeach
    
</select>
