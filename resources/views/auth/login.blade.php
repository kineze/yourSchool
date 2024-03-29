@extends('auth.layouts.app')

@section('content')

<body class="m-0 font-sans antialiased font-normal text-left bg-white leading-default text-base dark:bg-slate-950 text-slate-500 dark:text-white/80">

    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section>
        <div class="relative flex items-center justify-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
          <div class="container z-1">
            <div class="flex flex-wrap xl:ml-8 -mx-3">

              <div class="flex  flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">

                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                  <div class="p-6 justify-center  -ml-4 pb-0 flex flex-wrap items-center space-x-3 mb-0">
                    {{-- <img class=" max-w-80" src="{{asset('assets/img/royal-college.png')}}" alt="logo"> --}}
                    <div>
                        <h4 class="font-bold text-2xl text-center uppercase mb-0">Admin Dashboard</h4>
                        <p class="font-semibold text-center mb-0">Welcome! user, Log In now.</p>
                    </div>
                  </div>

                  <div class="flex-auto py-6 px-6">
                   
                    <form role="form text-left" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-2">
                          <label for="email" class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Email</label>
                          <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} text-sm focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-orange-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                          @error('email')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="mb-2">
                          <label for="password" class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Password</label>
                          <input type="password" id="password" name="password" required autocomplete="current-password" class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}text-sm focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-orange-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" />
                          @error('password')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                        </div>
                        {{-- <div class="min-h-6 mb-0.5 block pl-12 text-left">
                          <input id="remember_me" name="remember" class="mt-0.5 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" checked="" />
                          <label class="mb-2 ml-1 font-normal cursor-pointer select-none text-sm text-slate-700" for="remember">Remember me</label>
                        </div> --}}
                        <div class="text-center">
                          <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-600 to-purple-400 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign in</button>
                        </div>
                        
                      </form>
                  </div>

                  {{-- <div class="p-6 flex justify-center pb-0 mb-0">

                    <h3 class="">
                        <span class="font-bold text-6">Your Path  </span>
                    </h3>
                    <h3>
                        <span class="font-bold text-5xl"> To <strong class=" text-14 text-purple-600"> Limitless Learning! </strong></span>
                    </h3>
                
                  </div> --}}
              
                </div>
              </div>
              <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                <div class="relative flex flex-col justify-center h-2/3 px-48 m-4 bg-contain bg-center bg-no-repeat rounded-xl" style="background-image: url({{asset('assets/img/nenamal-final-logo.webp')}})">
                  <img class="absolute left-0 opacity-40" src="https://demos.creative-tim.com/soft-ui-dashboard-pro/assets/img/shapes/pattern-lines.svg" alt="pattern-lines">
                
                </div>
              </div>
            </div>
          </div>
      </div>

      </section>
    </main>

  </body>
    
@endsection
