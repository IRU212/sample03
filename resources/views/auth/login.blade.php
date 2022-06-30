<!DOCTYPE html>
<html>
    @extends('head')
    <body>
        <div class="left">
            <img src="./img/login_back.jpg" alt="">
            <div class="left-text">
                Let's talk
                about<br> anime and manga
            </div>
        </div>
        <div class="right">
            <div>
                <div>
        
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="main_form_text">Sign In</div>

                        <x-jet-validation-errors class="mb-4" />
                        
                        <div>
                            <div class="div_text">email</div>
                            <x-jet-input id="email" class="border_inpt" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
            
                        <div class="mt-4">
                            <div class="div_text">password</div>
                            <x-jet-input id="password" class="border_inpt" type="password" name="password" required autocomplete="current-password" />
                        </div>
            
                        <div class="input_checkbox">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="input_checkbox">{{ __('Remember me') }}</span>
                            </label>

                        </div>
            
                        <div class="forget_text">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
            
                            <x-jet-button class="input_submit">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
