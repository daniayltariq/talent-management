<select class="example-getting-started" name="{{$name}}" multiple="multiple">
    @foreach($options as $opt)
        <option value="{{ $opt }}" >{{ $opt }}</option>
    @endforeach
    
</select>
