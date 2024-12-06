@aso 
<form method="post" action="{{ route('yggdrasil.post') }}">
    @csrf 
    感情一覧<br>
    <select name="feeling">
        @foreach($feelings as $feeling)
        <option vlaue={{ $feeling -> feeling_id }}>
            {{ $feeling->feeling_name }}
        </option>
        @endforeach
    </select>
    <button name="create" type="submit">作成!</button>
</form>

{{ session('message') }}