@extends('admin.layouts.app')

@section('content')
    
<div class="w-full p-6 mx-auto">

  <div class="justify-between flex w-full sm:flex pb-4">
    <div class="flex w-full flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
            <h4 class="dark:text-white mx-3 text-lg">{{$student->name}}</h4>
        </div>
    </div>
    <div class="flex gap-x-2 items-center">
        <button type="button" data-toggle="modal" data-target="#appointmentModal" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-blue-700 text-blue-500 hover:text-blue-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>Appoinment</button>
        <a href="{{route('editStudent', $student->id)}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>Update</a>
        {{-- <form action="{{ route( 'deleteStudent', $student->id ) }}" id="delete-form-{{ $student->id }}" method="POST">
            @csrf
            <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $student->id }})">Delete</button>
        </form> --}}
    </div>

    @if($errors->any())
    <div class="bg-red-300 text-black rounded-3 p-6 my-5">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>


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
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">Payments</p>
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
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">completion</p>
                      <h5 class="mb-0 font-bold dark:text-white">
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
                      <p class="mb-0 font-semibold leading-normal capitalize text-sm dark:text-white/60">Documents</p>
                      <h5 class="mb-0 font-bold dark:text-white">
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
                  {{-- <img src="../../../assets/img/team-3.jpg" alt="avatar image" class="inline-flex items-center justify-center mr-2 text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" /> --}}
                </div>
                @if($student->consultant !== null)
                  <div class="flex flex-col justify-center">
                    <h6 class="mb-0 leading-normal text-sm dark:text-white">{{$student->consultant->name}}</h6>
                    <p class="leading-tight text-xs dark:text-white/60">{{$student->consultant->email}}</p>
                  </div>
                @elseif($student->consultant == null)
                  <div class="flex flex-col justify-center">
                    <h6 class="mb-0 leading-normal text-sm dark:text-white">Please select a consultant</h6>
                  </div>
                @endif
              </div>
              
              <div class="w-4/12 max-w-full px-3 flex-0">
                @if($student->consultant == null)
                  <span class="bg-gradient-to-tl from-red-600 to-orange-400 py-2.2 px-3.6 text-xs rounded-1.8 float-right ml-auto inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Inactive</span>
                @elseif($student->consultant !== null)
                <span class="bg-gradient-to-tl from-green-600 to-teal-400 py-2.2 px-3.6 text-xs rounded-1.8 float-right ml-auto inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                @endif
              </div>
            </div>
          </div>

          <div class="flex-auto p-4 pt-1">
            @if($student->consultant == null)
            <div class="flex p-4 rounded-xl bg-gray-50 dark:bg-gray-600">
              <h4 class="my-auto dark:text-white"><span class="mr-1 leading-normal text-sm text-slate-400 dark:text-white/80"></span><span class="ml-1 leading-normal text-sm text-slate-400 dark:text-white/80">please assign a consultant</span></h4>
              <button type="button" data-toggle="modal" data-target="#assignModal"  class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft active:opacity-85 active:shadow-soft-xs hover:scale-102 border-slate-700 text-slate-700 hover:border-slate-700 hover:bg-transparent hover:opacity-75 active:border-slate-700 active:bg-slate-700 active:text-white">Assign</button>
            </div>
            @elseif($student->consultant !== null)
              <div class="flex p-4 rounded-xl bg-gray-50 dark:bg-gray-600">
                <h4 class="my-auto dark:text-white"><span class="mr-1 leading-normal text-sm text-slate-400 dark:text-white/80"></span><span class="ml-1 leading-normal text-sm text-slate-400 dark:text-white/80">Reassign consultant</span></h4>
                <button type="button" data-toggle="modal" data-target="#assignModal"  class="inline-block px-6 py-3 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in tracking-tight-soft active:opacity-85 active:shadow-soft-xs hover:scale-102 border-slate-700 text-slate-700 hover:border-slate-700 hover:bg-transparent hover:opacity-75 active:border-slate-700 active:bg-slate-700 active:text-white">ReAssign</button>
              </div>
            @endif
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
                <h6 class="mb-0 dark:text-white">Upcoming Appoinments</h6>
              </div>
              <div class="flex items-center justify-end w-full max-w-full px-3 md:flex-0 shrink-0 md:w-6/12">
                <small>23 - 30 March 2020</small>
              </div>
            </div>
            <hr class="h-px mx-0 my-4 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
          </div>

          <div class="flex-auto p-4 pt-0">
            <ul class="flex flex-col pl-0 mb-0 rounded-none">
              @foreach ($appointments as $appointment)
              <li class="border-black/12.5 rounded-t-inherit relative mb-4 block flex-col items-center border-0 border-solid px-4 py-0 pl-0 text-inherit">
                <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-fuchsia-500 before:content-['']">
                  <div class="flex items-center">
                    <div class="min-h-6 pl-7 mb-0.5 block">
                      <input class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-[0.67rem] after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                    </div>
                    <h6 class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-white">{{$appointment->title}}</h6>
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
                          <form action="{{ route( 'deleteAppointment', $appointment->id ) }}" id="delete-form-{{  $appointment->id }}" method="POST">
                            @csrf
                            <button type="submit" class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-red-500 hover:bg-gray-200 hover:text-red-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" onclick="ConfirmDelete(event, {{  $appointment->id }})">Delete</button>
                        </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="flex items-center pl-1 mt-4 ml-6">
                    <div>
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                      <span class="font-bold leading-tight text-xs">{{$appointment->date}}</span>
                    </div>
                    <div class="ml-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Time</p>
                      <span class="font-bold leading-tight text-xs">{{$appointment->timeslot->start_time}}</span>
                    </div>
                    <div class="mx-auto">
                      <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Consultant</p>
                      <span class="font-bold leading-tight text-xs">{{$appointment->consultant->name}}</span>
                    </div>
                  </div>
                </div>
                <hr class="h-px mx-0 my-6 mb-0 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
              </li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
      {{-- <div class="w-full max-w-full px-3 mt-6 flex-0 lg:mt-0 lg:w-4/12">
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
      </div> --}}
    </div>
  </div>

  <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="assignModal" aria-hidden="true">
    <div class="relative w-auto m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 ease-soft-out -translate-y-13">
        <div class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto dark:bg-gray-950 bg-clip-padding border-black/20 rounded-xl outline-0">
            <div class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                <h5 class="mb-0 leading-normal mr-2 dark:text-white" id="ModalLabel">Assign Consultant</h5>
                <button type="button" data-toggle="modal" data-target="#assignModal" class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black dark:text-white border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 " data-dismiss="modal"></button>
            </div>
            <form class="relative" id="supplier-form"  action="{{route('assignConsultant', $student->id)}}" method="post">
                @csrf 
                <div active form="info" class="
                    flex flex-col visible p-6 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div>
                        <div class="flex flex-wrap -mx-3">
                          <div class=" max-w-full px-3 flex-0 w-full">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="docType">select Consultant{{$student->consultant_id}}</label>
                            <select choice name="consultant" id="choices-consultant">
                                <option value="">Select the consultant</option>
                                @foreach ($consultants as $consultant) 
                                    <option value="{{ $consultant->id }}" {{  $student->consultant_id == $consultant->id ? 'selected' : '' }}>
                                        {{ $consultant->name }}
                                    </option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="flex flex-wrap -mx-3">
                          <div class=" w-full max-w-full px-3 mt-4 flex-0 sm:mt-0">
                              <label class="mt-3">
                                <input id="new-appoinment" name="new-appoinment" value="1" type="checkbox" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"
                                onchange="toggleAppoinmentContainer(this)"
                              />
                              <label for="new-appoinment" class="cursor-pointer select-none text-slate-700">create new appoinment</label>
                              </label>
                          </div>
                      </div>

                      <div id="appoinment-container" style="display: none;">

                        <div class="flex flex-wrap -mx-3">
                          <div class="w-full max-w-full px-3 flex-0">
                              <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">Title</label>
                              <input type="text" name="title" placeholder="title" class="{{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('UserName') }}"/>
                              @error('title')
                                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>

                        <div class="flex flex-wrap -mx-3">
                          <div class="w-full max-w-full px-3 flex-0">
                              <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="birth_date">Date</label>
                              <input datetimepicker type="date" id="startDatePicker" type="text" placeholder="Please select a date"  name="date" class="{{ $errors->has('date') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('birth_date') }}"/>
                              @error('date')
                                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                              @enderror
                          </div>
                        </div>

                        <div class="flex flex-wrap -mx-3">
                          <div class=" max-w-full px-3 flex-0 w-full">
                            <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="docType">Time Slot</label>
                            <select choice name="timeslot" id="choices-timeSlot">
                                <option value="">Select Time Slot</option>
                                @foreach ($timeSlots as $timeslot)
                                    <option value="{{ $timeslot->id }}">
                                        {{ $timeslot->name }}
                                    </option>
                                @endforeach
                            </select>
                          </div>
                        </div>

                      </div>
  

                        <div class="flex flex-wrap items-center justify-end py-4 border-t mt-4 border-solid shrink-0 border-slate-100 rounded-b-xl">
                            <button type="button" data-toggle="modal" data-target="#assignModal" class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-slate-600 to-slate-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Close</button>
                            <button type="submit"class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-blue-600 to-blue-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Assign</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="appointmentModal" aria-hidden="true">
  <div class="relative w-auto m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 ease-soft-out -translate-y-13">
      <div class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto dark:bg-gray-950 bg-clip-padding border-black/20 rounded-xl outline-0">
          <div class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
              <h5 class="mb-0 leading-normal mr-2 dark:text-white" id="ModalLabel">create Appointment</h5>
              <button type="button" data-toggle="modal" data-target="#appointmentModal" class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black dark:text-white border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 " data-dismiss="modal"></button>
          </div>
          <form class="relative" id="supplier-form"  action="{{route('createAppointment', $student->id)}}" method="post">
              @csrf 
              <div active form="info" class="
                  flex flex-col visible p-6 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                  <div>
                      <div class="flex flex-wrap -mx-3">
                        <div class=" max-w-full px-3 flex-0 w-full">
                          <input type="hidden" name="consultant" value="{{$student->consultant->id}}">  
                        </div>
                      </div>


                      <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">Title</label>
                            <input type="text" name="title" placeholder="title" class="{{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('UserName') }}"/>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                      <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="birth_date">Date</label>
                            <input datetimepicker type="date" id="startDatePicker" type="text" placeholder="Please select a date"  name="date" class="{{ $errors->has('date') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('birth_date') }}"/>
                            @error('date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                      </div>

                      <div class="flex flex-wrap -mx-3">
                        <div class=" max-w-full px-3 flex-0 w-full">
                          <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="docType">Time Slot</label>
                          <select choice name="timeslot" id="choices-timeSlot2">
                              <option value="">Select Time Slot</option>
                              @foreach ($timeSlots as $timeslot)
                                  <option value="{{ $timeslot->id }}">
                                      {{ $timeslot->name }}
                                  </option>
                              @endforeach
                          </select>
                        </div>
                      </div>


                      <div class="flex flex-wrap items-center justify-end py-4 border-t mt-4 border-solid shrink-0 border-slate-100 rounded-b-xl">
                          <button type="button" data-toggle="modal" data-target="#appointmentModal" class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-slate-600 to-slate-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Close</button>
                          <button type="submit"class="inline-block px-8 py-2 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-blue-600 to-blue-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Assign</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection

@push('scripts')

<script>
  const startDatePicker = flatpickr("#startDatePicker", {
    dateFormat: "Y-m-d", // Set your desired date format
  });
</script>

<script>
  function toggleAppoinmentContainer(checkbox) {
    const appoinmentContainer = document.getElementById('appoinment-container');
    appoinmentContainer.style.display = checkbox.checked ? 'block' : 'none';
  }
</script>
    
@endpush