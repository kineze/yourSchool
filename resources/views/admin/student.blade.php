@extends('admin.layouts.app')

@section('content')
    
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0 lg:w-8/12">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 flex-0 lg:w-4/12">
            <div data-tilt class="after:bg-gradient-to-tl after:from-slate-300 after:to-slate-100 after:opacity-85 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl after:z-1 relative flex h-full min-w-0 flex-col items-center break-words rounded-2xl border-0 bg-white bg-clip-border after:absolute after:top-0 after:left-0 after:block after:h-full after:w-full after:rounded-2xl after:bg-black/40 after:content-['']" style="transform-style: preserve-3d; will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)">
              <div class="mb-7 absolute h-full w-full rounded-2xl"></div>
                <div class="relative flex-auto p-6 text-center text-white z-2">
                    <div id="img-placeholder" class="w-full max-w-full !flex justify-center">
                        @if($student->image_path)
                            <img id="previewImage" class="w-44 mt-4 h-44 rounded-full" src="{{ asset('/storage/'.$student->image_path) }}" alt="">
                        @else
                            <!-- Placeholder image when student's image path is null -->
                            <img id="placeholderImage" class="w-44 mt-4 h-44 rounded-full" src="{{ asset('assets/img/user.jpg') }}" alt="Placeholder Image">
                        @endif
                    </div>
                    <h2 class="mt-2 mb-0 text-white flex-wrap text-[24px] transition-all duration-500">{{$student->name}}</h2>
                </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-6 flex-0 md:w-6/12 lg:mt-0 lg:w-4/12">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                      <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white opacity-100"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">Today's money</p>
                      <h5 class="mb-0 font-bold dark:text-white">$53,000</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                      <i class="ni leading-none ni-planet text-lg relative top-3.5 text-white opacity-100"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">Sessions</p>
                      <h5 class="mb-0 font-bold dark:text-white">
                        9,600
                        <span class="font-bold leading-normal text-sm text-lime-500">+15%</span>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-6 flex-0 md:w-6/12 lg:mt-0 lg:w-4/12">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                      <i class="ni leading-none ni-world text-lg relative top-3.5 text-white opacity-100"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">today's users</p>
                      <h5 class="mb-0 font-bold dark:text-white">
                        2,300
                        <span class="font-bold leading-normal text-sm text-lime-500">+3%</span>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 stroke-none">
                      <i class="ni leading-none ni-shop text-lg relative top-3.5 text-white opacity-100"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">sign-ups</p>
                      <h5 class="mb-0 font-bold dark:text-white">
                        348
                        <span class="font-bold leading-normal text-sm text-lime-500">+12%</span>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
            <div class="flex flex-wrap -mx-3">
              <div class="flex w-8/12 max-w-full px-3 flex-0">
                <div>
                  <img src="../../../assets/img/team-3.jpg" alt="avatar image" class="inline-flex items-center justify-center mr-2 text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" />
                </div>
                <div class="flex flex-col justify-center">
                  <h6 class="mb-0 leading-normal text-sm dark:text-white">Lucas Prila</h6>
                  <p class="leading-tight text-xs dark:text-white/60">2h ago</p>
                </div>
              </div>
              <div class="w-4/12 max-w-full px-3 flex-0">
                <span class="bg-gradient-to-tl from-blue-600 to-cyan-400 py-2.2 px-3.6 text-xs rounded-1.8 float-right ml-auto inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Recommendation</span>
              </div>
            </div>
          </div>

          <div class="flex-auto p-4 pt-1">
            <h6 class="dark:text-white">I need a Ruby developer for my new website.</h6>
            <p class="leading-normal text-sm dark:text-white/60">The website was initially built in PHP, I need a professional ruby programmer to shift it.</p>
            <div class="flex p-4 rounded-xl bg-gray-50 dark:bg-gray-600">
              <h4 class="my-auto dark:text-white"><span class="mr-1 leading-normal text-sm text-slate-400 dark:text-white/80">$</span>3,000<span class="ml-1 leading-normal text-sm text-slate-400 dark:text-white/80">/ month </span></h4>
              <a href="javascript:;" class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft active:opacity-85 active:shadow-soft-xs hover:scale-102 border-slate-700 text-slate-700 hover:border-slate-700 hover:bg-transparent hover:opacity-75 active:border-slate-700 active:bg-slate-700 active:text-white">APPLY</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 flex-0 lg:w-8/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                <h6 class="mb-0 dark:text-white">To do list</h6>
              </div>
              <div class="flex items-center justify-end w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                <small>23 - 30 March 2020</small>
              </div>
            </div>
            <hr class="h-px mx-0 my-4 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
          </div>

          <div class="flex-auto p-4 pt-0">
            <ul class="flex flex-col pl-0 mb-0 rounded-none">
              <li class="border-black/12.5 rounded-t-inherit relative mb-4 block flex-col items-center border-0 border-solid px-4 py-0 pl-0 text-inherit">
                <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-fuchsia-500 before:content-['']">
                  <div class="flex items-center">
                    <div class="min-h-6 pl-7 mb-0.5 block">
                      <input class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-[0.67rem] after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                    </div>
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-white">Check status</h6>
                    <div class="relative pr-0 ml-auto lg:float-right">
                      <a href="javascript:;" class="cursor-pointer" dropdown-trigger aria-expanded="false">
                        <i class="fa fa-ellipsis-h text-slate-400 dark:text-white/80"></i>
                      </a>
                      <p class="hidden transform-dropdown-show"></p>
                      <ul dropdown-menu class="dark:shadow-soft-dark-xl z-100 dark:bg-gray-950 text-sm lg:shadow-soft-3xl duration-250 min-w-44 transform-dropdown right-5.5 pointer-events-none absolute -top-12 left-auto m-0 mt-2 -ml-12 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all sm:-ml-6">
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="flex items-center pl-1 mt-4 ml-6">
                    <div>
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                      <span class="font-bold leading-tight text-xs">24 March 2019</span>
                    </div>
                    <div class="ml-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Project</p>
                      <span class="font-bold leading-tight text-xs">2414_VR4sf3#</span>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Company</p>
                      <span class="font-bold leading-tight text-xs">Creative Tim</span>
                    </div>
                  </div>
                </div>
                <hr class="h-px mx-0 my-6 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
              </li>
              <li class="border-black/12.5 rounded-t-inherit relative mb-4 block flex-col items-center border-0 border-solid px-4 py-0 pl-0 text-inherit">
                <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-slate-700 before:content-['']">
                  <div class="flex items-center">
                    <div class="min-h-6 pl-7 mb-0.5 block">
                      <input class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" checked />
                    </div>
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-white">Management discussion</h6>
                    <div class="relative pr-0 ml-auto lg:float-right">
                      <a href="javascript:;" class="cursor-pointer" dropdown-trigger aria-expanded="false">
                        <i class="fa fa-ellipsis-h text-slate-400 dark:text-white/80"></i>
                      </a>
                      <p class="hidden transform-dropdown-show"></p>
                      <ul dropdown-menu class="dark:shadow-soft-dark-xl z-100 dark:bg-gray-950 text-sm lg:shadow-soft-3xl duration-250 min-w-44 transform-dropdown right-5.5 pointer-events-none absolute -top-12 left-auto m-0 mt-2 -ml-12 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all sm:-ml-6">
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="flex items-center pl-1 mt-4 ml-6">
                    <div>
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                      <span class="font-bold leading-tight text-xs">24 March 2019</span>
                    </div>
                    <div class="ml-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Project</p>
                      <span class="font-bold leading-tight text-xs">4411_8sIsdd23</span>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Company</p>
                      <span class="font-bold leading-tight text-xs">Apple</span>
                    </div>
                  </div>
                </div>
                <hr class="h-px mx-0 my-6 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
              </li>
              <li class="border-black/12.5 rounded-t-inherit relative mb-4 block flex-col items-center border-0 border-solid px-4 py-0 pl-0 text-inherit">
                <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-yellow-400 before:content-['']">
                  <div class="flex items-center">
                    <div class="min-h-6 pl-7 mb-0.5 block">
                      <input class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" checked />
                    </div>
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-white">New channel distribution</h6>
                    <div class="relative pr-0 ml-auto lg:float-right">
                      <a href="javascript:;" class="cursor-pointer" dropdown-trigger aria-expanded="false">
                        <i class="fa fa-ellipsis-h text-slate-400 dark:text-white/80"></i>
                      </a>
                      <p class="hidden transform-dropdown-show"></p>
                      <ul dropdown-menu class="dark:shadow-soft-dark-xl z-100 dark:bg-gray-950 text-sm lg:shadow-soft-3xl duration-250 min-w-44 transform-dropdown right-5.5 pointer-events-none absolute -top-12 left-auto m-0 mt-2 -ml-12 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all sm:-ml-6">
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="flex items-center pl-1 mt-4 ml-6">
                    <div>
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                      <span class="font-bold leading-tight text-xs">25 March 2019</span>
                    </div>
                    <div class="ml-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Project</p>
                      <span class="font-bold leading-tight text-xs">827d_kdl33D1s</span>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Company</p>
                      <span class="font-bold leading-tight text-xs">Slack</span>
                    </div>
                  </div>
                </div>
                <hr class="h-px mx-0 my-6 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
              </li>
              <li class="border-black/12.5 rounded-t-inherit relative mb-4 block flex-col items-center border-0 border-solid px-4 py-0 pl-0 text-inherit">
                <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-lime-500 before:content-['']">
                  <div class="flex items-center">
                    <div class="min-h-6 pl-7 mb-0.5 block">
                      <input class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                    </div>
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-white">IOS App development</h6>
                    <div class="relative pr-0 ml-auto lg:float-right">
                      <a href="javascript:;" class="cursor-pointer" dropdown-trigger aria-expanded="false">
                        <i class="fa fa-ellipsis-h text-slate-400 dark:text-white/80"></i>
                      </a>
                      <p class="hidden transform-dropdown-show"></p>
                      <ul dropdown-menu class="dark:shadow-soft-dark-xl z-100 dark:bg-gray-950 text-sm lg:shadow-soft-3xl duration-250 min-w-44 transform-dropdown right-5.5 pointer-events-none absolute -top-12 left-auto m-0 mt-2 -ml-12 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all sm:-ml-6">
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="flex items-center pl-1 mt-4 ml-6">
                    <div>
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                      <span class="font-bold leading-tight text-xs">26 March 2019</span>
                    </div>
                    <div class="ml-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Project</p>
                      <span class="font-bold leading-tight text-xs">88s1_349DA2sa</span>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Company</p>
                      <span class="font-bold leading-tight text-xs">Facebook</span>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
        <div class="relative flex flex-col min-w-0 overflow-hidden break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
            <div class="flex items-center">
              <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-blue-600 to-cyan-400 stroke-none shadow-soft-2xl">
                <i class="ni leading-none ni-calendar-grid-58 text-lg relative top-3.5 text-white"></i>
              </div>
              <div class="ml-4">
                <p class="mb-0 font-semibold leading-normal capitalize text-sm">Tasks</p>
                <h5 class="mb-0 font-bold dark:text-white">480</h5>
              </div>
              <div class="w-1/4 ml-auto">
                <div>
                  <div>
                    <span class="font-semibold leading-tight text-xs">60%</span>
                  </div>
                </div>
                <div class="h-0.75 text-xs flex overflow-visible rounded-lg bg-gray-200">
                  <div class="transition-width duration-600 ease-soft rounded-1 -mt-0.4 bg-gradient-to-tl from-blue-600 to-cyan-400 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap text-center text-white"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="flex-auto p-0 mt-4">
            <div>
              <canvas id="chart-line-projects" height="100"></canvas>
            </div>
          </div>
        </div>
        <div class="relative flex flex-col min-w-0 mt-6 overflow-hidden break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-5/12">
                <div class="flex">
                  <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg fill-current bg-gradient-to-tl from-blue-600 to-cyan-400 stroke-none shadow-soft-2xl">
                    <i class="ni leading-none ni-delivery-fast text-lg relative top-3.5 text-white"></i>
                  </div>
                  <div class="ml-4">
                    <p class="mb-0 font-semibold leading-normal capitalize text-sm">Projects</p>
                    <h5 class="mb-0 font-bold dark:text-white">115</h5>
                  </div>
                </div>
                <span class="py-2.2 rounded-1.8 text-sm mt-4 block whitespace-nowrap bg-transparent px-0 pb-0 text-left align-baseline font-normal leading-none text-white">
                  <i class="bg-gradient-to-tl from-blue-600 to-cyan-400 rounded-circle mr-1.5 inline-block h-1.5 w-1.5 align-middle"></i>
                  <span class="font-semibold leading-tight text-xs text-slate-500 dark:text-white">Done</span>
                </span>
                <span class="py-2.2 rounded-1.8 text-sm block whitespace-nowrap bg-transparent px-0 text-left align-baseline font-normal leading-none text-white">
                  <i class="bg-gradient-to-tl from-slate-600 to-slate-300 rounded-circle mr-1.5 inline-block h-1.5 w-1.5 align-middle"></i>
                  <span class="font-semibold leading-tight text-xs text-slate-500 dark:text-white">In progress</span>
                </span>
              </div>
              <div class="w-full max-w-full px-3 my-auto lg:flex-0 shrink-0 lg:w-7/12">
                <div class="ml-auto">
                  <canvas id="chart-bar-projects" height="150"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="leading-normal text-center copyright text-sm text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
            <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>

@endsection