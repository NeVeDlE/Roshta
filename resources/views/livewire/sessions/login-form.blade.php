<div>
    <main class="loginFormSection w-full flex flex-col justify-center items-center">
        <div class="loginForm bg-white w-96 h-auto">
            <h2 class="text-center text-blue-400 font-normal text-3xl mt-2">Log In</h2>
            <form class="form flex flex-col" method="post" action="{{ route('login') }}">
                @csrf
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2 " for="userName">Email:</label>
                    <input type="text" name="email" class="w-10/12 mx-auto shadow-inner h-9 userName controller"
                           id="email">
                </div>
                @if($show==true)
                    <div class="formInput my-3 flex flex-col relative">
                        <label class="py-2 px-2 " for="passInput">Password:</label>
                        <input type="password" wire:model="password"
                               class="w-10/12 mx-auto h-9 shadow-inner passInput controller"
                               id="password" name="password">
                        <button wire:click.prevent="toggle" class="absolute" style="top: 60%;right: 12%;">
                            <i class="far fa-eye" style="cursor: pointer;"></i>
                        </button>
                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                @else
                    <div class="formInput my-3 flex flex-col relative">
                        <label class="py-2 px-2 " for="passInput">Password:</label>
                        <input type="text" wire:model="password"
                               class="w-10/12 mx-auto h-9 shadow-inner passInput controller"
                               id="password" name="password">
                        <button wire:click.prevent="toggle" class="absolute" style="top: 60%;right: 12%;">
                            <i class="far fa-eye-slash" style="cursor: pointer;"></i>
                        </button>

                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                @endif
                <div class="formInput my-2 flex justify-start items-center mx-2">

                    <label class="px-2 text-blue-400 cursor-pointer"> <input name="remember" type="checkbox"
                                                                             class="mr-2 shadow-md rememberMe">Remember
                        Me?</label>
                </div>
                <button
                    class="uppercase bg-red-400 py-2 px-3 mx-2 rounded-md text-white shadow-md hover:bg-red-500">Login
                </button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-center text-blue-400 my-1 underline mt-2">Forgotten
                        Password?</a>
                @endif
            </form>
            <hr class="w-full mt-5 mb-2 border border-gray-300">
            <div class="createAccount flex flex-col justify-center items-center ">
                <label class="getAcc text-blue-400">New User?</label>
                <a class=" w-11/12 text-center uppercase bg-blue-400 py-2 px-3 mx-2 my-5 shadow-md rounded-md text-white hover:bg-blue-600"
                   href="{{route('register')}}">Create Account</a>
            </div>
        </div>
    </main>

</div>
