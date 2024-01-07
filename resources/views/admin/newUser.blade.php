@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <form class="relative" enctype="multipart/form-data" id="main-form"  action="{{ route('storeUser') }}" method="post">
        @csrf
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
            <h4 class="dark:text-white mx-3">Create New User</h4>
            {{-- <p>We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play.</p> --}}
            </div>
            {{-- <div class="flex flex-col justify-center w-full max-w-full px-3 text-right shrink-0 lg:flex-0 lg:w-6/12">
                        <button type="button" class="inline-block px-6 py-3 mt-2 mb-0 mr-auto font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer lg:ml-auto lg:mr-0 lg:mt-0 hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-orange-700 to-orange-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create New User</button>
                    </div> --}}
        </div>
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:w-8/12 lg:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">user Information</h5>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">UserName</label>
                            <input type="text" name="UserName" placeholder="username" class="{{ $errors->has('UserName') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('UserName') }}"/>
                            @error('UserName')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="email">Email</label>
                            <input type="email" name="email" placeholder="example@org.com"  class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('email') }}"/>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Phone</label>
                            <input type="text" name="phone" placeholder="XXXXXXXXXX" class="{{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('phone') }}"/>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class=" w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                            <label class=" mt-6 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="password">password</label>
                            <input type="password" name="password" placeholder="password" class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                            <label class="mt-6 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="ConfirmPassword">Confirm password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm password" class="{{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 mt-4 flex-0 sm:mt-0">
                            <label class="mt-3">
                                <input id="reset-password" name="reset_password" type="checkbox"  value="1" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" />
                                <label for="reset-password" class="cursor-pointer select-none text-slate-700">Ask user to reset password when first login</label>
                            </label>
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
                        <button type="submit" href="javascript:;" class="inline-block float-right px-8 py-2 mt-16 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create User</button>
                    </div>

                

                </div>
                </div>
            </div> 

            <div class="w-full max-w-full shrink-0 lg:w-4/12 sm:flex-0">
                <div class=" relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Access Levels</h5>

                    @if ($errors->has('roles'))
                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('roles') }}</p>
                    @endif
                    
                    <div class="grid h-fit w-full sm:grid-cols-1 gap-2">

                        @role('Admin')
                            <div class="relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                <label>
                                <input  id="checkbox-1" name="roles[]" value="Admin" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                <label for="checkbox-1" class="cursor-pointer select-none text-slate-700">Admin</label>
                                </label>
                            </div>
                            
                            <div class="relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                <label>
                                <input id="checkbox-2" name="roles[]" value="Manager" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                <label for="checkbox-2" class="cursor-pointer select-none text-slate-700">Manager</label>
                                </label>
                            </div>
                        @endrole

                        @role('Admin|Manager')
                            <div class="relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                <label>
                                <input id="checkbox-3" name="roles[]" value="Coordinator" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                <label for="checkbox-3" class="cursor-pointer select-none text-slate-700">Coordinator</label>
                                </label>
                            </div>

                            <div class="relative flex {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                <label>
                                <input id="checkbox-4" name="roles[]" value="Consultant" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                <label for="checkbox-4" class="cursor-pointer select-none text-slate-700">Consultant</label>
                                </label>
                            </div>

                            <div class="relative flex {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                <label>
                                <input id="checkbox-4" name="roles[]" value="Finance" class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                <label for="checkbox-4" class="cursor-pointer select-none text-slate-700">Finance</label>
                                </label>
                            </div>
                        @endrole


                    </div>
        
        
                </div>
                </div>
        
            </div>
        
        </div>

        
    </form>

  </div>
    
@endsection