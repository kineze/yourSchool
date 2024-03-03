@extends('admin.layouts.app')

@section('content')



<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 text-center flex-0">
        <h3 class="mt-12 mb-4">Add New Class</h3>
        {{-- <h5 class="font-normal dark:text-white text-slate-400">This information will Create Classes On the System</h5> --}}
        <div multisteps-form="" class="mb-12">
          <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-8/12">
                <form class="relative"  id="main-form"  action="{{ route('storeClass') }}" method="post">
                    @csrf
                    <div active="" form="about" class="absolute top-0 left-0 flex flex-col visible w-full h-auto min-w-0 p-4 break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    
                    <div class="flex flex-wrap -mx-3 text-start">
                    
                    </div>
                    <div>
                        <div class="flex flex-wrap mt-4">
                        

                        <div class="flex-auto text-start w-full p-6">
                            <div class="flex w-full justify-between items-center"> 
                                {{-- <h5 class="font-bold w-full mb-0 dark:text-white">General Information</h5> --}}
                            
                            </div>
                            <div class="flex flex-wrap -mx-3">
                               
                            </div>
        
                            <div class="flex flex-wrap -mx-3">
                               
                                
                                <div class="w-full max-w-full px-3 flex-0 sm:w-6/12">
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
        
                            

                            <div class="flex justify-end w-full">
                                <button type="submit" id="submit-fr" href="javascript:;" class=" mt-6 inline-block float-right px-8 py-2 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-blue-700 to-purple-400 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create Class</button>
                            </div>
                        
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection