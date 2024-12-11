@aso
魔法をかけた！IDは{{ $new->id }}です！<br>
<select name="feeling">
    @foreach($find as $f)
    <option value={{ $f->feeling_name }}>
        {{ $f->feeling_name }}
    </option>
    @endforeach
</select>