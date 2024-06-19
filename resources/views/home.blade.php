<x-layout.app>
        <div class="login">
        
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>
               
                <div class="login__forms">
                    <form action="{{ route('login') }}" method="POST" class="login__create">
                     @csrf

                    <h1 class="login__title">Sign In</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" name="email" class="login__input" required>
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input" required>
                        </div>

                        <a href="#" class="login__forgot">Forgot password?</a>

                        <button type="submit" class="login__button">Sign In</button>

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up"><a href="/register" class="">Sign Up</a></span>
                        </div>
                    </form>

                    
                </div>
            </div>

        </div>
</x-layout.app>
