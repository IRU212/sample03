<!DOCTYPE html>
<html>
    @extends('head')
    <body>
        <div class="left">
            <img src="./img/login_back.jpg" alt="">
            <div class="left-text">
                Let's talk about<br> 
                anime and manga
            </div>
        </div>
        <div class="right">
            <div>
                <div>
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="main_form_text">Sign Up</div>
                        <x-jet-validation-errors class="mb-4" />
                        <div>
                            <div class="div_text">name</div>
                            <x-jet-input class="border_inpt" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
            
                        <div class="mt-4">
                            <div class="div_text">emal</div>
                            <x-jet-input class="border_inpt" type="email" name="email" :value="old('email')" required />
                        </div>
            
                        <div class="mt-4">
                            <div class="div_text">password</div>
                            <x-jet-input id="password" class="border_inpt" type="password" name="password" required autocomplete="new-password" />
                        </div>
            
                        <div class="mt-4">
                            <div class="div_text">confirm password</div>
                            <x-jet-input id="password_confirmation" class="border_inpt" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
            
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>
            
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
            
                        <div class="aleady_text">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
            
                            <x-jet-button class="input_submit">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>