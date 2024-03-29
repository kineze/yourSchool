@extends('admin.layouts.app')

@section('content')

<style>
    input[type="radio"]:checked + span {
    display: block;
  }
  
  /* You can use @apply when moving this into your tailwind css file, like so */
  /*
  input[type="radio"]:checked + span {
    @apply block;
  }
  */
  </style>

<div class="w-full p-6 mx-auto">

    <form class="relative" enctype="multipart/form-data" onsubmit="handleFormSubmission()" id="main-form"  action="{{ route('storeStudent') }}" method="post">
        @csrf

        
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
                <h4 class="dark:text-white mx-3 flex">New Student</h4>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-300 text-white rounded-3 p-6 my-5">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:w-8/12 lg:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                
                
                
                    <div class="flex-auto w-full p-6">
                    <div class="flex w-full justify-between items-center"> 
                        <h5 class="font-bold w-full mb-0 dark:text-white">General Information</h5>
                        <div class="flex justify-end w-full">
                            <button type="submit" id="submit-fr" href="javascript:;" class="inline-block float-right px-8 py-2 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-blue-700 to-purple-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create Student</button>
                        </div>
                    </div>

                    <div class="w-full max-w-full flex-0">
                        <div class=" mt-8 inline-flex w-full items-center justify-center relative text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                            <div class="grid h-fit w-full sm:grid-cols-2 gap-6">
                                <label for="plan-growth" class="relative flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                                <span class="font-semibold text-gray-500 leading-tight uppercase mb-3">Nenamal Royal <br> College - Kelaniya</span>
                                <input type="radio" name="location" id="plan-growth" value="1" class="absolute h-0 w-0 appearance-none" checked />
                                <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-blue-500 bg-blue-200 bg-opacity-10 rounded-lg">
                                    <span class="absolute top-4 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-blue-600">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    </span>
                                </span>
                                </label>
                                <label for="plan-hobby" class="relative flex flex-col h-fit bg-white p-5 rounded-lg shadow-md cursor-pointer">
                                <span class="font-semibold text-gray-500 leading-tight uppercase mb-3">Nenamal Royal <br> College - Mawaramandiya</span>
                                <input type="radio" name="location" id="plan-hobby" value="2" class="absolute h-0 w-0 appearance-none" />
                                <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-blue-500 bg-blue-200 bg-opacity-20 rounded-lg">
                                    <span class="absolute top-4 right-4 h-6 w-6 inline-flex items-center justify-center rounded-full bg-blue-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-blue-600">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    </span>
                                </span>
                                </label>
                            </div>

                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">Student Name <span class="text-red-600">*</span></label>
                            <input type="text" name="UserName" placeholder="student name" class="{{ $errors->has('UserName') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('UserName') }}"/>
                            @error('UserName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="admissionId">Admission Id <span class="text-red-600">*</span></label>
                            <input type="text" name="admission_id" placeholder="admission id" class="{{ $errors->has('admission_id') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('admission_id') }}"/>
                            @error('admission_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="w-full max-w-full px-3 flex-0  sm:w-6/12">
                            <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="class">Class <span class="text-red-600">*</span></label>
                            <select choice name="class" id="choices-classes">
                                <option value="">select class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                            </select>
                            @error('class')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
        
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="birth_date">Admission Date <span class="text-red-600">*</span> </label>
                            <input datetimepicker type="date" id="admissionDatePicker" value="{{ old('admission_date') }}" type="text" placeholder="Please select a date"  name="admission_date" class="{{ $errors->has('admission_date') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('admission_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0  sm:w-6/12">
                            <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="medium">Medium <span class="text-red-600">*</span> </label>
                            <select choice name="medium" id="choices-medium">
                                <option value="">select Medium</option>
                                <option value="English">English</option>
                                <option value="Sinhala">Sinhala</option>
                            </select>

                            @error('medium')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="address">Address (optional)</label>
                            <input type="text" name="address" placeholder="123 Street, City" class="{{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('address') }}"/>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="birth_date">Birth Date <span class="text-red-600">*</span></label>
                            <input datetimepicker type="date" id="startDatePicker" value="{{ old('birth_date') }}" type="text" placeholder="Please select a date"  name="birth_date" class="{{ $errors->has('birth_date') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('birth_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="hidden">
                        <div class="flex flex-wrap w-full mt-6 -px-3">
                            <div class="w-full max-w-full px-3">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" checked  name="advanced-c" id="showAdvanced" class="mr-2"> Add Advanced Information
                                </label>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap w-full mt-6 -px-3">
                            <div class="w-full max-w-full px-3">
                                <label class="flex items-center mb-2">
                                    <input type="checkbox" checked name="gaurdian-c" id="showGuardian" class="mr-2"> Add Guardian Information
                                </label>
                            </div>
                        </div>
                    </div>
                
                </div>
                </div>
            </div> 

            

            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-4/12">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:bg-opacity-20 dark:backdrop-blur-xl dark:shadow-soft-dark-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Student Image</h5>
                    <div class="flex justify-center flex-wrap items-center -mx-3">

                        <div class=" w-full">
                            <div class="flex justify-center">
                                <video id="webcamPreview" class="h-80 w-80" width="100%" height="100%" style="display: none;  object-fit: cover;" autoplay muted></video>
                            </div>
                            <div class="flex justify-center">
                                <button id="captureBtn" type="button" class="ml-4 mt-4 px-5 py-4 font-bold text-white bg-red-500 rounded-full border-1 border-white cursor-pointer" style="display: none;"><i class="fas text-white text-2xl fa-camera"></i></button>
                            </div>
                        </div>

                        <div id="img-placeholder" class="w-full max-w-full !flex justify-center" style="display: none;">
                            <img id="previewImage" class=" w-44 mt-4 h-44 rounded-full object-cover"  src="{{ asset('assets/img/user.jpg') }}" alt="">
                        </div>

                        <div class=" flex justify-center mt-4">
                            <button id="openWebcamBtn" type="button" class="font-bold text-white bg-gray-500 py-2 px-5 rounded-full whitespace-nowrap cursor-pointer"><i class="fas text-white mr-2 fa-camera"></i>Open Camera</button>
                        </div>

                        <div class="w-full flex items-end  max-w-full ">
                            <div class=" mr-2  max-w-full">
                                <label class="mt-6 mb-2 w-full font-bold text-xs text-center text-slate-700 dark:text-white/80" for="notes">Or Upload Image</label>
                                <div dropzone class="dropzone !min-h-fit focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-border px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" id="dropzone">
                                    <input type="file" name="stu-img" multiple onchange="previewFile()" />
                                    <input type="file" name="webcam_capture_file" id="webcamCaptureFile" multiple style="display: none;">
                                </div>
                            </div>
                        </div>    

                  </div>
                </div>
            </div>
            </div>
     
            <div class="flex flex-wrap w-full mt-6 -px-3" id="advance-container">
                <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:mt-0">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <h5 class="font-bold dark:text-white">Advanced Information</h5>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="st-nic">Student Birth Form ID / NIC <span class="text-red-600">*</span></label>
                                <input type="text" name="st-nic" placeholder="student " class="{{ $errors->has('st-nic') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('st-nic') }}"/>
                                @error('st-nic')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full max-w-full px-3 flex-0  sm:w-4/12">
                                <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gender">Gender <span class="text-red-600">*</span></label>
                                <select choice name="gender" id="choices-gender">
                                    <option value="">select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full max-w-full px-3 flex-0  sm:w-4/12">
                                <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gender">Blood Group</label>
                                <select choice name="blood-group" id="choices-blood-group">
                                    <option value="">select blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B">B</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>


                        <div class="flex flex-wrap -mx-3">

                            <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="prev-school">Previous School</label>
                                <input type="text" name="prev-school" placeholder="student " class="{{ $errors->has('prev-school') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('prev-school') }}"/>
                                @error('prev-school')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full max-w-full px-3 flex-0  sm:w-4/12">
                                <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gender">Orphan Student</label>
                                <select choice name="orphan" id="choices-orphan">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="w-full max-w-full px-3 flex-0  sm:w-4/12">
                                <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gender">religion</label>
                                <select choice name="religion" id="choices-religion">
                                    <option value="">Select religion</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhism">Buddhism</option>
                                </select>
                            </div>
                        </div>
                    
                    </div>
                    </div>
                </div> 
            </div>

        <div class="flex flex-wrap w-full mt-6 -px-3" id="gaurdian-container">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Guardian Information</h5>
                    <div class="flex flex-wrap -mx-3">
                        
                        <div class="w-full max-w-full px-3 flex-0  sm:w-4/12">
                            <label class="mb-2 mt-6 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="role">Role <span class="text-red-600">*</span></label>
                            <select choice name="role" id="choices-role">
                                <option value="">select Guardian</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gName">Guardian Name <span class="text-red-600">*</span></label>
                            <input type="text" name="gName" placeholder="gaurdian name " class="{{ $errors->has('gName') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('gName') }}"/>
                            @error('gName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="gNic">Guardian NIC</label>
                            <input type="text" name="gNic" placeholder="gaurdian name" class="{{ $errors->has('gNic') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('gNic') }}"/>
                            @error('gNic')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="flex flex-wrap -mx-3">

                        <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="profession">Profession</label>
                            <input type="text" name="profession" placeholder="profession " class="{{ $errors->has('profession') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('profession') }}"/>
                            @error('profession')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 flex-0 sm:w-4/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Phone <span class="text-red-600">*</span></label>
                            <div class="flex items-center">
                                <input type="text" name="phone" placeholder="XXXXXXXXXX" 
                                    class="{{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" 
                                    value="{{ old('phone') }}"
                                />
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full max-w-full px-3 lg:w-4/12 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="whatsapp">Whatsapp Number</label>
                            <input type="text" name="whatsapp" placeholder="xxxxxxxxxxx" class="{{ $errors->has('whatsapp') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('gPhone') }}"/>
                            @error('whatsapp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-4/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="email">Email (optional)</label>
                            <input type="email" name="email" placeholder="example@org.com"  class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('email') }}"/>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                </div>
                </div>
            </div> 
        </div>

        <div class="px-3 flex justify-end w-full">
            <button type="submit" id="submit-fr" href="javascript:;" class="inline-block float-right px-8 py-2 mt-4 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-blue-700 to-purple-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create Student</button>
        </div>
        
    </form>

</div>

  
    
@endsection

@push('scripts')

<script>
    const startDatePicker = flatpickr("#startDatePicker", {
      dateFormat: "Y-m-d",
    });
</script>

<script>
    const admissionDatePicker = flatpickr("#admissionDatePicker", {
      dateFormat: "Y-m-d",
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to preview the selected file or webcam capture

        const fileInput = document.querySelector('input[name="stu-img"]');
        fileInput.addEventListener('change', previewFile);

        function previewFile() {
            const placeholder = document.getElementById('img-placeholder');
            const webcamPreview = document.getElementById('webcamPreview');
            const previewImage = document.getElementById('previewImage');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                previewImage.src = URL.createObjectURL(file);
                placeholder.style.display = 'block'; // Show the image placeholder
            } else if (webcamPreview.srcObject) {
                placeholder.style.display = 'block';
            } else {
                previewImage.src = "{{ asset('assets/img/upload-default.png') }}";
                placeholder.style.display = 'none'; // Hide the image placeholder
            }
        }

        // Capture and submit the webcam image
        const openWebcamBtn = document.getElementById('openWebcamBtn');
        const webcamPreview = document.getElementById('webcamPreview');
        const captureBtn = document.getElementById('captureBtn');
        const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
        const previewImage = document.getElementById('previewImage');
        let webcamStream;

        openWebcamBtn.addEventListener('click', async () => {
            try {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    webcamStream = await navigator.mediaDevices.getUserMedia({ video: true });
                    webcamPreview.srcObject = webcamStream;
                    webcamPreview.play();
                    captureBtn.style.display = 'block';
                    webcamPreview.style.display = 'block';
                } else {
                    console.error('getUserMedia is not supported in this browser');
                }
            } catch (error) {
                console.error('Error accessing webcam:', error);
            }
        });

        captureBtn.addEventListener('click', () => {
            if (webcamStream) {
                const canvas = document.createElement('canvas');
                canvas.width = webcamPreview.videoWidth;
                canvas.height = webcamPreview.videoHeight;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(webcamPreview, 0, 0, canvas.width, canvas.height);

                canvas.toBlob((blob) => {
                    const file = new File([blob], 'webcam_capture.png', { type: 'image/png' });

                    // Update the previewImage after setting the files
                    previewImage.src = URL.createObjectURL(file);

                    // Stop webcam stream after capturing
                    webcamStream.getTracks().forEach(track => track.stop());
                    webcamStream = null;

                    // Manually create a File object and assign it to the hidden webcamCaptureFileInput
                    const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
                    const webcamCaptureFile = new File([blob], 'webcam_capture.png', { type: 'image/png' });

                    // Here, manually assign the File object to the input files
                    webcamCaptureFileInput.files = createFileList([webcamCaptureFile]);

                    // Hide the webcam preview element
                    webcamPreview.style.display = 'none';
                    captureBtn.style.display = 'none';
                }, 'image/png');
            }
        });

        function createFileList(items) {
            const dataTransfer = new DataTransfer();
            items.forEach(item => {
                dataTransfer.items.add(item);
            });
            return dataTransfer.files;
        }

        // Function to handle form submission
        function handleFormSubmission() {
            // You can add any additional form validation here if needed

            // Disable the submit button to prevent double submission
            const submitButton = document.getElementById('submit-fr');
            submitButton.disabled = true;

            // Show a loading indicator inside the submit button
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';

            // Manually append the webcamCaptureFile to the form data
            const form = document.querySelector('#main-form');
            const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
            const webcamCaptureFile = webcamCaptureFileInput.files[0];

            if (webcamCaptureFile) {
                const formData = new FormData(form);
                formData.append('webcam_capture_file', webcamCaptureFile);

                // Submit the form with the updated formData
                fetch(form.action, {
                    method: form.method,
                    body: formData,
                })
                    .then(response => {
                        if (response.redirected) {
                            // If the response is a redirect, redirect the user to the provided URL
                            window.location.href = response.url;
                        } else {
                            return response.json();
                        }
                    })
                    .then(data => {
                        // Handle the response as needed
                        console.log(data);

                        // Show SweetAlert on success
                        Swal.fire({
                            icon: 'success',
                            title: 'Student added successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                    })
                    .finally(() => {
                        // Enable the submit button and restore its original content
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Create';
                    });
            } else {
                // If no webcam capture file, submit the form as usual
                form.submit();
            }
        }

        // Add an event listener to the "Create Student" button
        const submitButton = document.getElementById('submit-fr');
        submitButton.addEventListener('click', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Call the function to handle form submission
            handleFormSubmission();
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the phone input element
        var phoneInput = document.querySelector('input[name="phone"]');

        // Add an event listener for the input event
        phoneInput.addEventListener('input', function() {
            // Get the value of the input
            var inputValue = phoneInput.value.trim();

            // Check if the input starts with '94'
            if (!inputValue.startsWith('94')) {
                // If not, add '94' to the beginning
                phoneInput.value = '94' + inputValue;
            }

            // Check if '0' is used after '94'
            if (inputValue.startsWith('940')) {
                // Remove the '0' after '94'
                phoneInput.value = '94' + inputValue.slice(3);
            }
        });

        // Add an event listener for form submission (optional)
        // You can add additional validation logic here if needed
        document.querySelector('form').addEventListener('submit', function(event) {
            var inputValue = phoneInput.value.trim();

            // Validate if '94' is present and '0' is not used after '94'
            if (!inputValue.startsWith('94') || inputValue.startsWith('940')) {
                alert('Invalid phone number format');
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showAdvancedCheckbox = document.getElementById('showAdvanced');
        const showGuardianCheckbox = document.getElementById('showGuardian');
        const advancedContainer = document.getElementById('advance-container');
        const guardianContainer = document.getElementById('gaurdian-container');

        // Initially hide the containers
        advancedContainer.style.display = 'block';
        guardianContainer.style.display = 'block';

        showAdvancedCheckbox.addEventListener('change', function () {
            advancedContainer.style.display = this.checked ? 'block' : 'none';
        });

        showGuardianCheckbox.addEventListener('change', function () {
            guardianContainer.style.display = this.checked ? 'block' : 'none';
        });
    });
</script>
 
@endpush