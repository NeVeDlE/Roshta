<div>
    <main class="my-9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap form-container">
                        <div class="login-wrap form-title p-4 p-md-5">
                            <h3 class="mb-3 text-center">Register!</h3>
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="mt-2"
                              enctype="multipart/form-data">
                            @csrf
                            <x-form.input name="name" wire="name"/>
                            <x-form.input name="email" type="email" wire="email"/>
                            <x-form.input name="birthday" type="date" wire="birthday"/>
                            <x-form.input name="national_id" wire="national_id"/>
                            @if($show==true)
                                <x-form.input name="password" wire="password" type="password"/>
                                <button wire:click="toggle()">
                                    <i wire:click="toggle" class="far fa-eye" style="cursor: pointer;"></i>
                                </button>
                            @else
                                <x-form.input name="password" wire="password"/>
                                <button wire:click="toggle()">
                                    <i class="far fa-eye-slash" style="cursor: pointer;"></i>
                                </button>
                            @endif
                            <x-form.input name="password_confirmation" wire="password_confirmation"/>
                            <x-form.input name="phone" wire="phone"/>
                            <x-form.input name="picture" type="file" wire="picture"/>
                            <div class="form-group mt-3 mb-5 btns1 btns">
                                <x-submit-button>Submit</x-submit-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
