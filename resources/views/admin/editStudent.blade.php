@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <form class="relative" enctype="multipart/form-data" id="main-form"  action="{{ route('updateStudent', $student->id) }}" method="post">
        @csrf
        <div class="flex flex-wrap w-full -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
                <h4 class="dark:text-white mx-3">Update {{$student->name}}</h4>
            </div> 
            
            <div class="w-full max-w-full justify-end px-3 shrink-0 flex mb-2 lg:w-6/12">
                <a href="{{route('student', $student->id)}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>View Student</a>
            </div>

        </div>
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:w-8/12 lg:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Student Information</h5>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">student name</label>
                            <input type="text" name="UserName" value="{{$student->name}}" placeholder="stu name" class="{{ $errors->has('UserName') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('UserName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="email">Email (optional)</label>
                            <input type="email" name="email" value="{{$student->email}}" placeholder="example@org.com"  class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Phone</label>
                            <input type="text" name="phone" value="{{$student->phone}}" placeholder="XXXXXXXXXX" class="{{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="address">Address (optional)</label>
                            <input type="text" name="address" value="{{$student->address}}" placeholder="123 Street, City" class="{{ $errors->has('address') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="birth_date">Birth Date</label>
                            <input
                                datetimepicker
                                id="startDatePicker"
                                type="text"
                                placeholder="Please select a date"
                                name="birth_date"
                                class="{{ $errors->has('birth_date') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"
                                value="{{ old('birth_date') }}"
                            />
                            @error('birth_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="countries">Desired Countries (Optional)</label>
                            <select choice name="countries[]" id="choices-disease" multiple>
                                <option value="">Select countries</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ $student->countries->pluck('id')->contains($country->id) ? 'selected' : '' }}>
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> 

                    <button type="submit" href="javascript:;" class="inline-block float-right px-8 py-2 mt-16 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create User</button>
                
                </div>
                </div>
            </div> 

            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-4/12">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:bg-opacity-20 dark:backdrop-blur-xl dark:shadow-soft-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <h5 class="font-bold dark:text-white">Student Image</h5>
                        <div class="flex flex-wrap -mx-3">
                            <div id="img-placeholder" class="w-full max-w-full !flex justify-center">
                                <img id="previewImage" class="w-44 mt-4 h-44 rounded-full" src="{{ asset('storage/'. $student->image_path) }}" alt="">
                            </div>
                            <div class="w-full max-w-full px-3">
                                <div class="w-full max-w-full">
                                    <label class="mt-6 mb-2 font-bold text-xs text-slate-700 dark:text-white/80" for="notes">Upload Image</label>
                                    <div dropzone class="dropzone !min-h-fit focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-border px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" id="dropzone">
                                        <input type="file" name="stu-img" multiple onchange="previewFile()" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        </div>

        
    </form>

  </div>
    
@endsection

@push('scripts')

<script>
    const startDatePicker = flatpickr("#startDatePicker", {
        dateFormat: "Y-m-d", // Set your desired date format
        defaultDate: "{{$student->birth_date}}", // Set the initial value from your PHP variable
    });
</script>


<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var placeholder = document.getElementById('img-placeholder');
        var fileInput = document.querySelector('input[name="stu-img"]');
        var file = fileInput.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                placeholder.style.display = 'block'; // Show the image placeholder
            };

            reader.readAsDataURL(file);
        } else {
            // Assuming $student is the variable containing the student model
            preview.src = "{{ $student->imagepath ? asset('storage/' . $student->imagepath) : asset('assets/img/upload-default.png') }}";
            placeholder.style.display = 'block'; // Show the image placeholder
        }
    }
</script>

    
@endpush