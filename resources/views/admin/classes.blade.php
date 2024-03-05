@extends('admin.layouts.app')

@section('content')


<div class="w-full p-6 mx-auto">
    <div class="relative flex flex-col flex-auto min-w-0 p-4 mb-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border" id="profile">
        <div class="flex flex-wrap items-center justify-between -mx-3">
            <div class="w-4/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                <div class="h-full">
                    <h5 class="mb-1 font-bold dark:text-white">Classes</h5>
                    <p class="mb-0 font-semibold leading-normal text-sm">School / Classes</p>
                </div>
            </div>
        </div>
    </div>


    <div class="flex flex-wrap mt-6 -mx-3">

        <div class="w-full max-w-full px-3 md:w-7/12 md:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <h6 class="mb-0 dark:text-white">Classes</h6>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 max-h-70-screen overflow-y-auto rounded-lg">
                    @if(count($classes) !== 0 )
                        @foreach ($classes as $class)
                        <li class="relative flex p-6 mb-2 border-0 rounded-b-inherit rounded-xl bg-gray-50 dark:bg-transparent">
                            <div class="flex w-full flex-col">
                                <div class="flex mb-4 items-center justify-between">
                                    <h6 class=" leading-normal text-sm dark:text-white">{{$class->name}}</h6>
                                    <div class="ml-auto flex text-right">
                                        <form action="{{ route( 'deleteClass', $class->id ) }}" id="delete-form-{{ $class->id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 bg-gradient-to-tl from-red-600 to-rose-400 hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text" onclick="ConfirmDelete(event, {{ $class->id }})"><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-rose-400 bg-x-25 bg-clip-text" aria-hidden="true"></i>Delete</button>
                                        </form>
                                        <button type="button" data-toggle="modal" data-target="#class-{{ $class->id }}" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-slate-700 dark:text-white" href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>Edit</button>
                                    </div>
                                </div>
                                <span class="mb-2 leading-tight text-xs">Class Tacher: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{ $class->teacher ? $class->teacher->name : 'N/A' }}</span></span>
                                <span class="mb-2 leading-tight text-xs">Class Fee: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$class->amount}}</span></span>
                            </div>
                        </li>

                        <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="class-{{ $class->id }}" aria-hidden="true">
                            <div class="relative w-auto m-2 transition-transform duration-300 pointer-events-none sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 ease-soft-out -translate-y-13">
                                <div class="relative flex flex-col w-full bg-white border border-solid pointer-events-auto dark:bg-gray-950 bg-clip-padding border-black/20 rounded-xl outline-0">
                                <div class="flex items-center justify-between p-4 border-b border-solid shrink-0 border-slate-100 rounded-t-xl">
                                    <h5 class="mb-0 leading-normal mr-2 dark:text-white" id="ModalLabel">Update {{$class->name}}</h5>
                                    <button type="button" data-toggle="modal" data-target="#class-{{ $class->id }}" class="fa fa-close w-4 h-4 ml-auto box-content p-2 text-black dark:text-white border-0 rounded-1.5 opacity-50 cursor-pointer -m-2 " data-dismiss="modal"></button>
                                </div>
                                <form class="relative" id="supplier-form"  action="{{ route('updateClass', ['id' => $class->id]) }}" method="post">
                                    @csrf
                                    <div active form="info" class="
                                    flex flex-col visible px-6 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                                    <div>
                                        <div class="flex flex-wrap -mx-3">
                                            <div class="w-full max-w-full px-3 flex-0">
                                                <label class=" mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Class Name</label>
                                                <input type="text" name="name" value="{{$class->name}}" placeholder="Class Name" class="{{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('name') }}"/>
                                                @error('name')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
            
                                        <div class="flex flex-wrap -mx-3">
                                            <div class="w-full max-w-full px-3 flex-0">
                                                <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="teacher">Teacher</label>
                                                <select choice name="teacher" id="choices-gender">
                                                    <option value="">Select Teacher</option>
                                                    @foreach ($teachers as $teacher)
                                                    <option value="{{$teacher->id}}" {{ ($class->teacher_id == $teacher->id) ? 'selected' : '' }}>{{$teacher->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                    
                                        <div class="flex flex-wrap mt-4 -mx-3">
                                            <div class="w-full max-w-full px-3 flex-0">
                                                <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Class Fee</label>
                                                <div class="flex items-center">
                                                    <input type="text" name="fee" value="{{$class->amount}}" placeholder="XXXXXXXXXX" 
                                                        class="{{ $errors->has('fee') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" 
                                                        value="{{ old('fee') }}"
                                                    />
                                                </div>
                                                @error('fee')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                    
                                        <div class="flex flex-wrap items-center justify-end py-4 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                                            <button type="submit" id="submit-fr" href="javascript:;" class=" mt-6 inline-block float-right px-8 py-2 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-blue-700 to-purple-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update Class</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="rounded-t-2xl">
                        <h6 class="mb-0 text-red-500 dark:text-white">Ooops .....! No Classes To Show</h6>
                    </div>
                    @endif
                </ul>
              </div>
            </div>
          </div>


        <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-5/12">
            
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                <h6 class="font-bold dark:text-white">Add New Class</h6> 
                </div>

                <form class="relative" id="supplier-form"  action="{{ route('storeClass') }}" method="post">
                    @csrf
                    <div active form="info" class="
                        flex flex-col visible px-6 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                        <div>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 flex-0">
                                    <label class=" mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Class Name</label>
                                    <input type="text" name="name" placeholder="Class Name" class="{{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('name') }}"/>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 flex-0">
                                    <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="teacher">Teacher</label>
                                    <select choice name="teacher" id="choices-classes">
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="flex flex-wrap mt-4 -mx-3">
                                <div class="w-full max-w-full px-3 flex-0">
                                    <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Class Fee</label>
                                    <div class="flex items-center">
                                        <input type="text" name="fee" placeholder="XXXXXXXXXX" 
                                            class="{{ $errors->has('fee') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" 
                                            value="{{ old('fee') }}"
                                        />
                                    </div>
                                    @error('fee')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="flex flex-wrap items-center justify-end py-4 border-t border-solid shrink-0 border-slate-100 rounded-b-xl">
                                <button type="submit" id="submit-fr" href="javascript:;" class=" mt-6 inline-block float-right px-8 py-2 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-blue-700 to-purple-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create Class</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    
             
        </div>
    </div>
</div>

@endsection