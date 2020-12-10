<select class="js-example-basic-multiple gender-multi" name="{{$name}}[]" multiple="multiple">
    @foreach($options as $opt)
        <option value="{{isset($option_value)? $opt->$option_value : strtolower($opt) }}">{{isset($option_text)? $opt->$option_text : $opt }}</option>
    @endforeach
    
</select>
