@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-7/12 xl:w-8/12">
      <div class="flex flex-wrap -mx-3">
          <div class="flex w-full flex-wrap">
              <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-4/12 xl:mb-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                      <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                          <p class="mb-0 font-sans font-semibold leading-normal text-sm">Students</p>
                          <h5 class="mb-0 font-bold dark:text-white">
                              {{ count($students )}}
                          </h5>
                        </div>
                      </div>
                      <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                          <i class="ni leading-none ni-circle-08 text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-4/12 xl:mb-0">
                 <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                      <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                          <p class="mb-0 font-sans font-semibold leading-normal text-sm">Teachers</p>
                          <h5 class="mb-0 font-bold dark:text-white">
                            {{ count($teachers)}}
                          </h5>
                        </div>
                      </div>
                      <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                          <i class="ni leading-none ni-world text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-4/12 xl:mb-0">
                 <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                      <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                          <p class="mb-0 font-sans font-semibold leading-normal text-sm">Classes</p>
                          <h5 class="mb-0 font-bold dark:text-white">
                            {{count($classes)}}
                          </h5>
                        </div>
                      </div>
                      <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                          <i class="ni leading-none ni-watch-time text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          
        
      </div>
      <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
          <div class="widget-calendar border-black/12.5 shadow-soft-xl dark:bg-gray-950 dark:shadow-soft-dark-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="p-4 pb-0 rounded-t-2xl">
              <h6 class="mb-0 dark:text-white">Calendar</h6>
              <div class="flex">
                <div class="mb-0 font-semibold leading-normal widget-calendar-day text-sm"></div>
                <span>,&nbsp;</span>
                <div class="mb-1 font-semibold leading-normal widget-calendar-year text-sm"></div>
              </div>
            </div>
            <div class="flex-auto p-4">
              <div data-toggle="widget-calendar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full max-w-full px-3 mt-6 lg:flex-0 shrink-0 lg:mt-0 lg:w-5/12 xl:w-4/12">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 sm:flex-0 shrink-0 sm:w-6/12 lg:w-full">
          <div class="border-black/12.5 shadow-soft-xl dark:bg-gray-950 dark:shadow-soft-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="p-4 pb-0 rounded-t-4">
              <h6 class="mb-0 dark:text-white">Teachers</h6>
            </div>
            <div class="flex-auto p-4">
              <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              @if (count($teachers) != 0)
                @foreach ($teachers as $teacher)
                  <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                    <div class="flex items-center">
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-slate-700 dark:text-white">{{$teacher->name}}</h6>
                        <span class="leading-tight text-xs">{{$teacher->email}} <span class="font-semibold"></span></span>
                      </div>
                    </div>
                    <div class="flex">
                      <a href="{{route('user', $teacher->id)}}" class="group ease-soft-in leading-pro text-xs rounded-3.5xl p-1.2 h-6 w-6 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni leading-none ease-bounce text-3xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></a>
                    </div>
                  </li>
                @endforeach
              @else
              <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                <div class="flex items-center">
                  <div class="flex justify-center w-full flex-col">
                    <h6 class="mb-1 leading-normal text-sm text-red-700 dark:text-white">No teacher in the system</h6>
                  </div>
                </div>
              </li>
              @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection