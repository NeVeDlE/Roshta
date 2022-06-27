<div class="mb-4">
    <main class="registerForm w-full flex flex-col justify-center items-center">
        <div class="py-8 flex flex-col justify-center items-center">
            <img class="h-36" src="{{asset('images/Logo.png')}}">
        </div>
        <div class="registerationForm bg-white w-1/3 h-auto rounded-md shadow-md">

            <h2 class="text-center text-blue-400 font-normal text-3xl mt-2">Create Account</h2>

            <form class="form flex flex-col" method="post" action="{{ route('register') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2" for="username">Name:</label>
                    <input type="text" class="w-10/12 mx-auto shadow-inner h-9 username controller"
                           id="name" value="{{old('name')}}" wire:model="name" name="name">
                    @error('name')
                    <p class="text-red-500 text-xs mt-2 ml-9">{{$message}}</p>
                    @enderror
                </div>
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2" for="useremail">Email:</label>
                    <input type="email" class="w-10/12 mx-auto shadow-inner h-9 useremail controller"
                           id="email" value="{{old('email')}}" wire:model="email" name="email">
                    @error('email')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                </div>
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2" for="username">Phone:</label>
                    <input type="text" class="w-10/12 mx-auto shadow-inner h-9 username controller"
                           value="{{old('phone')}}" wire:model="phone" name="phone">
                    @error('phone')
                    <p class="text-red-500 text-xs mt-2 ml-9">{{$message}}</p>
                    @enderror
                </div>
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2 " for="userid">National ID:</label>
                    <input type="text" value="{{old('national_id')}}" wire:model="national_id"
                           class="w-10/12 mx-auto shadow-inner h-9 userid controller" name="national_id">
                    @error('national_id')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                </div>
                <div class="formInput flex flex-col my-3">
                    <label class="py-2 px-2 " for="userBirth">Birth Date:</label>
                    <input type="date" value="{{old('birthday')}}" wire:model="birthday"
                           class="w-10/12 mx-auto shadow-inner h-9 userBirth controller" name="birthday">
                    @error('birthday')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
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
                    <div class="formInput my-3 flex flex-col relative">
                        <label class="py-2 px-2 " for="passInput">Confirm Password:</label>
                        <input type="password" name="password_confirmation"
                               class="w-10/12 mx-auto h-9 shadow-inner passInput controller relative"
                               wire:model="password_confirmation">
                        <button wire:click.prevent="toggle" class="absolute" style="top: 60%;right: 12%;">
                            <i class="far fa-eye" style="cursor: pointer;"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                @else
                    <div class="formInput my-3 flex flex-col relative">
                        <label class="py-2 px-2 " for="passInput">Password:</label>
                        <input type="text" wire:model="password"
                               class="w-10/12 mx-auto h-9 shadow-inner passInput controller"
                               id="password" name="password">
                        <button wire:click.prevent="toggle" class="absolute" style="top: 60%;right: 12%;">
                            <i class="far fa-eye" style="cursor: pointer;"></i>
                        </button>

                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                    <div class="formInput my-3 flex flex-col relative">
                        <label class="py-2 px-2 " for="passInput">Confirm Password:</label>
                        <input type="text" name="password_confirmation"
                               class="w-10/12 mx-auto h-9 shadow-inner passInput controller relative"
                               wire:model="password_confirmation">
                        <button wire:click.prevent="toggle" class="absolute" style="top: 60%;right: 12%;">
                            <i class="far fa-eye" style="cursor: pointer;"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                @endif
                <div class="formInput flex flex-col my-3">
                     <label class="py-2 px-2" for="userPic">Upload Picture:</label>
                    <input name="picture" type="file" wire:model="picture"
                           class="w-10/12 mx-auto shadow-inner h-9 userPic controller">
                    @error('picture')
                    <p class="text-red-500 text-xs mt-2 ml-9 ">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit"
                        class="uppercase bg-red-400 py-2 px-3 mx-2 rounded-md text-white shadow-md hover:bg-red-500 my-3 mb-4">
                    Create
                    Account
                </button>
            </form>
        </div>
    </main>
</div>
