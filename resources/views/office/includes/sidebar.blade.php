<aside mini="false" class="dark:bg-gray-950  ease-soft-in-out z-990 max-w-64 dark: fixed inset-y-0 left-0 my-4 xl:ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 shadow-none transition-all duration-200 xl:translate-x-0 xl:bg-transparent" id="sidenav-main">
    <!-- header -->
  
    <div class="h-20">
      <!-- x i -->
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 dark:text-white xl:hidden" aria-hidden="true" sidenav-close-btn></i>
  
      <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 dark:text-white" href="{{url('/setdashboard')}}">
        <img src="{{asset('assets/img/royal-college.png')}}" class="inline-block h-full max-w-full transition-all duration-200 ease-soft-in-out max-h-10 dark:hidden" alt="main_logo" />
        <img src="{{asset('assets/img/royal-college.png')}}" class="hidden h-full max-w-full transition-all duration-200 ease-soft-in-out max-h-10 dark:inline-block" alt="main_logo" />
        <span class="ml-1 text-3xl text-transparent bg-clip-text bg-gradient-to-tl from-orange-600 to-orange-400 font-bold  transition-all duration-200 ease-soft-in-out"> SKYGATE</span>
      </a>
    </div>
  
    <!-- //---------hr----------// -->
  
    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
  
    <div class="items-center block w-full h-auto grow basis-full" id="sidenav-collapse-main">
      <!-- primary list  -->
  
      <ul class="flex flex-col pl-0 mb-0 list-none">
  
        {{-- <li class="mt-0.5 w-full">
          <a href="javascript:;" class="after:ease-soft-in-out after:font-awesome-5-free ease-soft-in-out text-sm py-2.7 active xl:shadow-soft-xl my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-all after:ml-auto after:inline-block after:rotate-180 after:font-bold after:text-slate-800 after:antialiased after:transition-all after:duration-200 after:content-['\f107'] dark:text-white dark:opacity-80" aria-controls="applicationsExamples" role="button" aria-expanded="true">
            <div class="stroke-none shadow-soft-sm bg-gradient-to-tl from-blue-600 to-cyan-400 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current p-2.5 text-center text-black">
              <svg class="text-dark" width="12px" height="12px" viewBox="0 0 42 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>basket</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -741.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="basket" transform="translate(153.000000, 450.000000)">
                        <path class="" d="M34.080375,13.125 L27.3748125,1.9490625 C27.1377583,1.53795093 26.6972449,1.28682264 26.222716,1.29218729 C25.748187,1.29772591 25.3135593,1.55890827 25.0860125,1.97535742 C24.8584658,2.39180657 24.8734447,2.89865282 25.1251875,3.3009375 L31.019625,13.125 L10.980375,13.125 L16.8748125,3.3009375 C17.1265553,2.89865282 17.1415342,2.39180657 16.9139875,1.97535742 C16.6864407,1.55890827 16.251813,1.29772591 15.777284,1.29218729 C15.3027551,1.28682264 14.8622417,1.53795093 14.6251875,1.9490625 L7.919625,13.125 L0,13.125 L0,18.375 L42,18.375 L42,13.125 L34.080375,13.125 Z" opacity="0.595377604"></path>
                        <path class="" d="M3.9375,21 L3.9375,38.0625 C3.9375,40.9619949 6.28800506,43.3125 9.1875,43.3125 L32.8125,43.3125 C35.7119949,43.3125 38.0625,40.9619949 38.0625,38.0625 L38.0625,21 L3.9375,21 Z M14.4375,36.75 L11.8125,36.75 L11.8125,26.25 L14.4375,26.25 L14.4375,36.75 Z M22.3125,36.75 L19.6875,36.75 L19.6875,26.25 L22.3125,26.25 L22.3125,36.75 Z M30.1875,36.75 L27.5625,36.75 L27.5625,26.25 L30.1875,26.25 L30.1875,36.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft text-slate-700">Dashboard</span>
          </a>
        </li> --}}
  
        {{-- Vouchers --}}
  
  
        <li class="mt-0.5 w-full">
          <a active_primary collapse_trigger="primary" href="javascript:;" class="after:ease-soft-in-out after:font-awesome-5-free ease-soft-in-out text-sm py-2.7 active xl:shadow-soft-xl my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-all after:ml-auto after:inline-block after:rotate-180 after:font-bold after:text-slate-800 after:antialiased after:transition-all after:duration-200 after:content-['\f107'] dark:text-white dark:opacity-80" aria-controls="applicationsExamples" role="button" aria-expanded="true">
            <div class="stroke-none shadow-soft-sm bg-gradient-to-tl from-orange-600 to-orange-200 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current p-2.5 text-center text-black">
              <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier"> <circle cx="12" cy="6" r="4" fill="#ffffff"/> <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" fill="#ffffff"/> </g>
                </svg>
            </div>
            
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft text-slate-700">Students</span>
          </a>
          
          <div class="h-auto overflow-hidden transition-all duration-200 ease-soft-in-out" id="ecommerceExamples">
            <ul class="flex flex-wrap pl-4 mb-0 ml-6 list-none transition-all duration-200 ease-soft-in-out">
  
              <li class="w-full">
                <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="{{url('/new-student')}}">
                  <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> R </span>
                  <span class="transition-all duration-100 pointer-events-none ease-soft">New Student</span>
                </a>
              </li>

              <li class="w-full">
                <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="{{url('/students')}}">
                  <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> R </span>
                  <span class="transition-all duration-100 pointer-events-none ease-soft">Students</span>
                </a>
              </li>

            </ul>
          </div>
        </li>


        @role('Manager')
          <li class="mt-0.5 w-full">
              <a active_primary collapse_trigger="primary" href="javascript:;" class="after:ease-soft-in-out after:font-awesome-5-free ease-soft-in-out text-sm py-2.7 active xl:shadow-soft-xl my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-all after:ml-auto after:inline-block after:rotate-180 after:font-bold after:text-slate-800 after:antialiased after:transition-all after:duration-200 after:content-['\f107'] dark:text-white dark:opacity-80" aria-controls="applicationsExamples" role="button" aria-expanded="true">
                <div class="stroke-none shadow-soft-sm bg-gradient-to-tl from-orange-600 to-orange-200 mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center fill-current p-2.5 text-center text-black">
                  <svg width="800px"fill="#ffffff" style="color: white;" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="#ffffff"/>
                      <path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="#ffffff"/>
                      <path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="#ffffff"/>
                      <path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="#ffffff"/>
                      <path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="#ffffff"/>
                      <path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="#ffffff"/>
                  </svg>
                </div>
                
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft text-slate-700">User Management</span>
              </a>
              
              <div class="h-auto overflow-hidden transition-all duration-200 ease-soft-in-out" id="ecommerceExamples">
                <ul class="flex flex-wrap pl-4 mb-0 ml-6 list-none transition-all duration-200 ease-soft-in-out">
      
                  <li class="w-full">
                    <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="{{url('new-user')}}">
                      <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> R </span>
                      <span class="transition-all duration-100 pointer-events-none ease-soft">New User</span>
                    </a>
                  </li>

                  <li class="w-full">
                      <a class="ease-soft-in-out py-1.6 ml-5.4 pl-4 text-sm before:-left-4.5 before:h-1.25 before:w-1.25 relative my-0 mr-4 flex items-center whitespace-nowrap bg-transparent pr-4 font-medium text-slate-800/50 shadow-none transition-colors before:absolute before:top-1/2 before:-translate-y-1/2 before:rounded-3xl before:bg-slate-800/50 before:content-[''] dark:text-white dark:opacity-60 dark:before:bg-white dark:before:opacity-80" href="{{url('/sys-users')}}">
                          <span class="w-0 text-center transition-all duration-200 opacity-0 pointer-events-none ease-soft-in-out"> R </span>
                          <span class="transition-all duration-100 pointer-events-none ease-soft">System Users</span>
                      </a>
                  </li>
    
                </ul>
              </div>
          </li>
        @endrole
     
      </ul>
    </div>
  
    <div class="pt-4 mx-4 mt-4">
      <!-- load phantom colors for card after: -->
      
     
      <div sidenav-card class="after:opacity-65 hidden bg-gradient-to-tl from-blue-600 to-cyan-400 relative min-w-0 flex-col items-center break-words rounded-2xl border-0 border-solid border-blue-900 bg-white bg-clip-border shadow-none after:absolute after:top-0 after:bottom-0 after:left-0 after:z-10 after:block after:h-full after:w-full after:rounded-2xl after:content-['']">
        <div class="mb-7 absolute h-full w-full rounded-2xl bg-[url('../../assets/img/curved-images/white-curved.jpg')] bg-cover bg-center"></div>
        <div class="relative z-20 flex-auto w-full p-4 text-left text-white">
          <div class="flex items-center justify-center w-8 h-8 mb-4 text-center bg-white bg-center rounded-lg icon shadow-soft-2xl">
            <i sidenav-card-icon class="top-0 z-10 text-transparent  leading-none fas fa-file text-lg bg-gradient-to-tl from-slate-600 to-slate-300 bg-clip-text opacity-80" aria-hidden="true"></i>
          </div>
          <div class="transition-all duration-200 ease-nav-brand">
            <h6 class="mb-0 text-white"></h6>
            <p class="mt-0 mb-4 font-semibold leading-tight text-xs"></p>
            <a href="{{url('doc_manager/dashboard')}}" target="_blank" class="inline-block w-full px-8 py-2 mb-0 font-bold text-center text-black uppercase transition-all ease-in bg-white border-0 border-white rounded-lg shadow-soft-md bg-150 leading-pro text-xs hover:shadow-soft-2xl hover:scale-102">Document Manager</a>
          </div>
        </div>
      </div>
  
      <!-- pro btn  -->
      <!-- <a class="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree">Upgrade to pro</a> -->
    </div>
  </aside>