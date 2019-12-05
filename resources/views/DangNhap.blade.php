<form action="{{route('login')}}" method="post">
	@csrf
	<input type="text" name="username" placeholder="Tên đăng nhập">
	<br>
	<input type="password" name="password" placeholder="Mật khẩu">
	<br>
	<input type="submit">
</form>