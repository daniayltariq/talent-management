<select class="example-getting-started" multiple="multiple">
    @foreach($options as $opt)
        <option value="{{ $opt }}" >{{ $opt }}</option>
    @endforeach
    
</select>
