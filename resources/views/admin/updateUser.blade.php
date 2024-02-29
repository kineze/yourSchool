@extends('admin.layouts.app')

@section('content')
<div class="w-full p-6 py-4 mx-auto my-4">
    <div class="flex flex-wrap mb-12 -mx-3">
        <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-3/12">
            <div class="sticky flex flex-col min-w-0 break-words bg-white border-0 top-1/100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <ul class="flex flex-col flex-wrap p-4 mb-0 list-none rounded-xl">
                    <li>
                    <a href="#profile" class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                        <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                        <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>spaceship</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(4.000000, 301.000000)">
                                    <path
                                    class="fill-slate-800"
                                    d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"
                                    ></path>
                                    <path class="fill-slate-800" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                                    <path class="fill-slate-800" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                                    <path class="fill-slate-800" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                                </g>
                                </g>
                            </g>
                            </g>
                        </svg>
                        </div>
                        <span class="leading-normal text-sm dark:text-white">User details</span>
                    </a>
                    </li>
                    <li class="pt-2">
                        <a href="#password" class="block px-4 py-2 transition-colors rounded-lg ease-soft-in-out text-slate-500 hover:bg-gray-200">
                            <div class="inline-block mr-2 text-black fill-current h-4 w-4 stroke-none">
                                <svg class="mb-1 text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>box-3d-50</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(603.000000, 0.000000)">
                                                    <path class="fill-slate-800" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                                                    <path class="fill-slate-800" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                                    <path class="fill-slate-800" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="leading-normal text-sm dark:text-white">Change Password</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 lg:w-9/12">
            <div class="relative flex flex-col flex-auto min-w-0 p-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border" id="profile">
                <div class="flex flex-wrap items-center justify-center -mx-3">
                    <div class="w-4/12 max-w-full px-3 flex-0 sm:w-auto">
                    
                    </div>
                    <div class="w-8/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                        <div class="h-full">
                            <h5 class="mb-1 font-bold dark:text-white">{{ $user->name }}</h5>
                        </div>
                    </div>
                    <div class="flex max-w-full px-3 mt-4 gap-4 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                        @foreach($user->roles as $role)
                            @if($role->name === 'Authorization')
                                <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-slate-200 text-slate-650 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                            @elseif($role->name === 'Enterer')
                                <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-lime-200 text-lime-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                            @elseif($role->name === 'docManager')
                                <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-lime-200 text-lime-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                            @endif
                        @endforeach
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
                </div>
            </div>

            <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border" id="basic-info">
                <div class="flex-auto pt-0">
                    <form class="relative" id="user-data"  action="{{route( 'updateUser', $user->id )}}" method="post">
                        @csrf
                        <div active form="info" class="
                            flex flex-col visible p-12 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 rounded-2xl bg-clip-border">
                            <div class="flex-auto p-6">
                                <h5 class="font-bold dark:text-white">user Information</h5>
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-full max-w-full px-3 flex-0">
                                        <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="UserName">UserName</label>
                                        <input type="text" name="UserName" value="{{$user->name}}" placeholder="username" class="{{ $errors->has('UserName') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                                        @error('UserName')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
            
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-full max-w-full px-3 mt-4 flex-0 sm:w-6/12 sm:mt-0">
                                        <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="email">Email</label>
                                        <input type="email" name="email" value="{{$user->email}}" placeholder="example@org.com"  class="{{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none"/>
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
                                        <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="phone">Phone</label>
                                        <input type="text" name="phone" value="{{$user->phone}}" placeholder="XXXXXXXXXX" class="{{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                                        @error('phone')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="flex-auto">
                                    <h5 class="font-bold dark:text-white">Access Levels</h5>
                
                                    @if ($errors->has('roles'))
                                        <p class="text-red-500 text-xs mt-1">{{ $errors->first('roles') }}</p>
                                    @endif
                                    
                                    <div class="flex justify-between flex-wrap h-fit w-full">
                
                                        @role('Admin')
                                        <div class="flex lg:space-x-4 justify-between py-2 w-full">
                                            <div class="lg:w-6/12 relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                                <label>
                                                <input  id="checkbox-1" name="roles[]" value="Admin" {{ in_array('Admin', $userRoles) ? 'checked' : '' }} class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                                <label for="checkbox-1" class="cursor-pointer select-none text-slate-700">Admin</label>
                                                </label>
                                            </div>
                                            
                                            <div class=" lg:w-6/12 relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                                <label>
                                                <input id="checkbox-2" name="roles[]" value="Manager" {{ in_array('Manager', $userRoles) ? 'checked' : '' }} class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                                <label for="checkbox-2" class="cursor-pointer select-none text-slate-700">Manager</label>
                                                </label>
                                            </div>
                                        </div>
                                        @endrole
                
                                        @role('Admin|Manager')
                                        <div class="flex justify-between lg:space-x-4 py-2 w-full">
                                            <div class=" lg:w-6/12 relative {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                                <label>
                                                <input id="checkbox-3" name="roles[]" value="Coordinator" {{ in_array('Coordinator', $userRoles) ? 'checked' : '' }} class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                                <label for="checkbox-3" class="cursor-pointer select-none text-slate-700">Coordinator</label>
                                                </label>
                                            </div>
                
                                            <div class=" lg:w-6/12 relative flex {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                                <label>
                                                <input id="checkbox-4" name="roles[]" value="Consultant" {{ in_array('Teacher', $userRoles) ? 'checked' : '' }} class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                                <label for="checkbox-4" class="cursor-pointer select-none text-slate-700">Teacher</label>
                                                </label>
                                            </div>
                                            </div>
                
                                            <div class="flex py-2 lg:space-x-4 justify-between mr-3 w-full">
                                                <div class="w-6/12 relative flex {{ $errors->has('roles') ? 'border-red-500' : 'border-gray-300' }} flex-col h-fit bg-white p-5 rounded-lg border-0.4 border-gray-300 cursor-pointer">
                                                    <label>
                                                    <input id="checkbox-5" name="roles[]" value="Finance" {{ in_array('Finance', $userRoles) ? 'checked' : '' }} class="w-5 h-5 ease-soft text-base mr-4 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
                                                    <label for="checkbox-5" class="cursor-pointer select-none text-slate-700">Finance</label>
                                                    </label>
                                                </div>
                                            </div>
                                        @endrole
                
                
                                    </div>
                        
                        
                                </div>

                                    
                                <button type="submit" href="javascript:;" class="inline-block float-right px-8 py-2 mt-16 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update User</button>

                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
            <div class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border" id="password">
                <div class="p-6">
                    
                    <form class="relative" id="password-reset"  action="{{ route('updateUserPassword', $user->id ) }}" method="POST">
                        @csrf
                        <div class="flex-auto p-6 pt-0">
                        <h5 class="mb-0 font-bold dark:text-white">Password Reset</h5>
                        <div class="flex flex-wrap -mx-3">
                            <div class=" w-full max-w-full px-3 mt-4 flex-0 sm:mt-0">
                                <label class=" mt-6 inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="password">password</label>
                                <input type="password" name="password" placeholder="password" class="{{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" />
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full max-w-full px-3 flex-0">
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
                                    <label for="send-password-email" class="cursor-pointer select-none text-slate-700">notify user Via Email? (this will send password to the user)</label>
                                </label>
                            </div>
                        </div>


                                <h5 class="mt-12 dark:text-white">Password requirements</h5>
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
                                <li>
                                    <span class="leading-normal text-sm">Change it often</span>
                                </li>
                            </ul>
                            <button type="submit" class="inline-block float-right px-8 py-2 mt-16 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update Password</button>
                        </div> 
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('password-reset');

        form.addEventListener('submit', function (event) {
            // Check if the user is authenticated using Laravel's Blade directives
            var isAuthUser = @auth
                true
            @else
                false
            @endauth;

            if (isAuthUser) {
                // Display SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Changing password will log out relevent user from all systems. Do you want to proceed?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, proceed!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "Yes, proceed!" submit the form
                        form.submit();
                    }
                });

                // Prevent the form from being submitted immediately
                event.preventDefault();
            }
        });
    });
</script>

    
@endpush