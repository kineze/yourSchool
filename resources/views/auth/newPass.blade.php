@extends('auth.layouts.app')

@section('content')

<body class="m-0 font-sans antialiased font-normal text-left leading-default text-base dark:bg-slate-950 bg-gray-50 text-slate-500 dark:text-white/80">
    <!-- sidenav -->

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <div class="pb-56 pt-12 m-4 min-h-50-screen items-start rounded-xl p-0 relative overflow-hidden flex bg-cover bg-center" style="background-image: url({{asset('assets/img/office.jpeg')}})">
        <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover opacity-60 bg-gradient-to-tl from-gray-800 to-slate-800"></span>
        <div class="container z-1">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto text-center shrink-0 lg:flex-0 lg:w-5/12">
              <h1 class="mt-6 mb-2 text-white">Welcome!</h1>
              <p class="text-white font-bold">You have received a one-time password (OTP) from your organization. Please set your permanent password below</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="flex flex-wrap justify-center -mx-3 -mt-48 lg:-mt-56 md:-mt-56">
          <div class="w-full max-w-full px-3 mx-auto shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-5/12">
            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="text-center flex justify-between border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6">
                <h5>Set Your New Password</h5>
                <div class="flex items-center">
                    <div class="relative">
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        
                            <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
              </div>

              <div class="flex-auto px-6 pb-6 text-start">
                <form role="form text-left" enctype="multipart/form-data" id="main-form"  action="{{ route('setNewPassword') }}" method="post">
                    @csrf 
                        <div class="flex-auto">
                            <div class="flex flex-wrap -mx-3">
                                <div class=" w-full max-w-full px-3 mt-4 flex-0 sm:mt-0">
                                    <label class=" inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="password">password</label>
                                    <input type="password" name="password" placeholder="password" class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                                    @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full max-w-full px-3 flex-0">
                                    <label class="mt-6 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="ConfirmPassword">Confirm password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm password" class="{{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3">
                                <div class=" w-full max-w-full px-3 mt-4 flex-0 sm:mt-0">
                                    <label class="mt-3">
                                        <input id="send-password-email" name="send_password_email" value="1" type="checkbox" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" />
                                        <label for="send-password-email" class="cursor-pointer select-none text-slate-700">Send Password Via Email?</label>
                                    </label>
                                </div>
                            </div>
        
                            <div class="">
                                <h5 class="mt-6 dark:text-white">Password requirements</h5>
                                <p class="mb-2 text-slate-500 dark:text-white/60">Please follow this guide for a strong password:</p>
                                <ul class="float-left pl-6 mb-0 list-disc text-slate-500">
                                <li>
                                    <span class="leading-normal text-sm">One special characters</span>
                                </li>
                                <li>
                                    <span class="leading-normal text-sm">Min 6 characters</span>
                                </li>
                                <li>
                                    <span class="leading-normal text-sm">One number (2 are recommended)</span>
                                </li>
                            
                                </ul>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-slate-600 to-slate-300 hover:border-slate-700 hover:bg-slate-700 hover:text-white">set New Password</button>
                            </div>
                        </div>
                        
                    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
</body>

    
@endsection