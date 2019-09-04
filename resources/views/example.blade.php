{{-- withError --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="d-inlineblock alert alert-danger alert-dismissible fade show">{{ $error }}</div>
    @endforeach
@endif


{{-- Form --}}
{{-- old 可以取得 session 輸入的內容 --}}
{{-- PHP 中撰寫 session(['key'=>'value']) --}}
<form method="POST" action="{{ route('register.post') }}">
    @csrf
    <input type="text" name="name" placeholder="請輸入用戶名" value="{{ old('name') }}" required><br>
    <input type="email" name="email" placeholder="請輸入Email" value="{{ old('email') }}" required><br>
    <input type="password" name="password" placeholder="請輸入密碼"  value="{{ old('password') }}" required><br>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>


{{-- 取得 Session 內容 --}}
@if (Session::get('login'))
    <li class="list-group-item"><a href="/logout">Logout</a></li>
@else
    <li class="list-group-item"><a href="/register">Register</a></li>
@endif
