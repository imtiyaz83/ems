<x-layout.app>
    <div class="login">

        <div class="login__content">

        <div class="login__img">
            <img src="assets/img/img-login.svg" alt="">
        </div>

        <div class="login__forms">

            <form action="{{ route('register.store') }}" class="login__create" id="" method="POST">
                @csrf
                <h1 class="login__title">Create Account</h1>

                <div class="login__box">
                    <i class='bx bx-user login__icon'></i>
                    <input type="text" placeholder="Name" class="login__input" id="name" name="name" value="{{ old('name') }}" >
                </div>

                <div class="login__box">
                    <i class='bx bx-at login__icon'></i>
                    <input type="text" placeholder="Email" class="login__input" id="email" name="email" value="{{ old('email') }}" >
                </div>

                <div class="login__box">
                    <i class='bx bx-lock-alt login__icon'></i>
                    <input type="password" placeholder="Password" class="login__input" name="password" id="password" >
                </div>
                <div class="login__box">
                    <i class='bx bx-at login__icon'></i>
                    <textarea class="form-control" placeholder="Bio" id="bio" name="bio" >{{ old('bio') }}</textarea>
                </div>
                <button type="submit" class="login__button">Sign Up</button>
                <div>
                    <span class="login__account">Already have an Account ?</span>
                    <span class="login__signup" id="sign-in"><a href="/">Sign In</a></span>
                </div>

                <div class="login__social">
                    <a href="#" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                    <a href="#" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                    <a href="#" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                </div>
                </form>
        </div>
    </div>
</x-layout.app>