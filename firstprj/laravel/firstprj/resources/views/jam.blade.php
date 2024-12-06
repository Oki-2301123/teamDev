@aso
<select name="feeling">
    @foreach($feelings as $feeling)
    <option value={{ $feeling->feeling_name }}>
        {{ $feeling->feeling_name }}
    </option>
    @endforeach
</select>