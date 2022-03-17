<form action="{{route('users.update',$user->id)}}" method="post">
    @csrf
    <div class="center">
        <h1>Update User</h1>
        <div class="txt_field">
            <input type="text" required name="name" id="name" value="{{$user->name}}">
            <label>Customer Name</label>
        </div>
        <div class="txt_field">
            <input type="email" required name="email" id="email" value="{{$user->email}}">
            <label>Customer Email</label>
        </div>
        <div class="txt_field">
            <input type="text" required name="address" id="address" value="{{$user->address}}">
            <label>Address</label>
        </div>
        <div class="txt_field">
            <input type="password" required name="password" id="password" value="{{$user->password}}">
            <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="password" required name="confirmPassword" id="password" value="{{$user->password}}">
            <label>Confirm Password</label>
        </div>
        <input type="submit" value="Register">
        <div class="signup_link">
        </div>
    </div>
</form>
