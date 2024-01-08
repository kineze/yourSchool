<nav navbar-main class=" flex  bg-white flex-wrap items-center justify-between px-0 py-2 mx-6 mt-6 transition-all  duration-250 ease-soft-in rounded-lg lg:flex-nowrap lg:justify-start sticky top-[1%] backdrop-saturate-200 backdrop-blur-2xl z-110 dark:bg-gray-950/80 dark:shadow-dark-blur" navbar-scroll="true">
  <div class="flex items-center justify-between w-full px-4 py-2 mx-auto flex-wrap-inherit">
    <nav>

      <ol class="flex flex-wrap pt-1 mr-6 bg-transparent rounded-lg sm:mr-8">
        <li class="leading-normal text-sm breadcrumb-item">
          <a class="text-slate-700 opacity-30 dark:text-white" href="javascript:;">
            <svg width="24px" height="24px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <rect x="0" fill="none" width="20" height="20"/>
              <g>
              <path d="M10 10L2.54 7.02 3 18H1l.48-11.41L0 6l10-4 10 4zm0-5c-.55 0-1 .22-1 .5s.45.5 1 .5 1-.22 1-.5-.45-.5-1-.5zm0 6l5.57-2.23c.71.94 1.2 2.07 1.36 3.3-.3-.04-.61-.07-.93-.07-2.55 0-4.78 1.37-6 3.41C8.78 13.37 6.55 12 4 12c-.32 0-.63.03-.93.07.16-1.23.65-2.36 1.36-3.3z"/>
              </g>
            </svg>
          </a>
        </li>
        <li class="text-sm pl-2 leading-normal before:float-left  before:text-gray-600">
          <a class="opacity-50 text-slate-700 dark:text-white" href="javascript:;">Welcome!</a>
        </li>
      </ol>
      <h6 class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left  before:text-gray-600 dark:text-white dark:before:text-white">{{ $user->name }}</h6>



      
    </nav>

    <div class="flex pr-4 items-center">
      <a mini-sidenav-burger href="javascript:;" class="hidden p-0 transition-all ease-nav-brand text-sm text-slate-500 xl:block" aria-expanded="false">
        <div class="w-4.5 overflow-hidden">
          <i class="ease-soft mb-0.75 relative block h-0.5 translate-x-[5px] rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
          <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
          <i class="ease-soft relative block h-0.5 translate-x-[5px] rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
        </div>
      </a>
    </div>

    <div class="relative max-w-120   flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
      <span class="text-sm ease-soft leading-5.6 absolute z-50 flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
      <input type="text" name="studentSearch" class="pl-9 text-sm focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here...">
      <div id="search-results" class="absolute z-50 top-12 left-0 w-full"></div>
    </div>

    

    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto" id="navbar">  
      <div class="flex items-center justify-end md:ml-auto md:pr-4">

        

        {{-- <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft">
          <span class="text-sm ease-soft leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
          <input type="text" class="pl-9 text-sm focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 ease-soft w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
        </div> --}}
      </div>
      <ul class="flex flex-row items-center justify-end pl-0 mb-0 list-none md-max:w-full">

        <li class="pr-4">
          <div class="min-h-6 mb-0.5 block pl-0">
            <input dark-toggle class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" />
          </div>
        </li>
        <!-- online builder btn  -->
        <!-- <li class="flex items-center">
        <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
      </li> -->
        
        <li class="flex items-center pl-4 xl:hidden">
          <a sidenav-trigger class="block p-0 transition-all ease-nav-brand text-sm text-slate-500 dark:text-white" href="javascript:;" aria-expanded="false">
            <div class="w-4.5 overflow-hidden">
              <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
              <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
              <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all dark:bg-white"></i>
            </div>
          </a>
        </li>
        <li class="hidden items-center px-4">
          <a href="javascript:;" class="p-0 transition-all text-sm ease-nav-brand text-slate-500 dark:text-white">
            <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog" aria-hidden="true"></i>
            <!-- fixed-plugin-button-nav  -->
          </a>
        </li>

        <li class="flex items-center">
          <div class="relative">
            <button dropdown-trigger aria-expanded="false" type="button" class="inline-block p-0 mr-4 cursor-pointer">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                @else
                    <span class="inline-flex rounded-md">
                            {{ Auth::user()->name }}

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                    </span>
                @endif
            </button>
            <p class="hidden transform-dropdown-show"></p>
            <ul dropdown-menu class="z-10 -mt-2 -ml-32 text-sm lg:shadow-soft-3xl dark:bg-black duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 transform-dropdown pointer-events-none absolute left-auto right-auto    list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-0 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
              <li>
                <a href="{{ route('profile.show') }}" class="py-1.2 lg:ease-soft  clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors font-bold lg:duration-300" href="javascript:;"> {{ __('Profile') }}</a>
              </li>
              <li>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <a href="{{ route('api-tokens.index') }}" class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300">
                    {{ __('API Tokens') }}
                </a>
            @endif
              </li>
              <li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                  @csrf
              
                  <button type="submit" class="py-1.2 lg:ease-soft font-bold clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300">
                      {{ __('Log Out') }}
                  </button>
              </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>