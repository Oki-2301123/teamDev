@aso
<form method="post" action="{{ route('grape.post') }}">
    @csrf
    <p>おなまえ： <input type="text" name="name" required></p>
    <p>ひるめし： <input type="text" name="lunch" required></p>
    <p><input type="submit" value="go!"></p>
</form>