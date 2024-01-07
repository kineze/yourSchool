@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 py-4 mx-auto my-4">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 mx-auto sm:flex-0 shrink-0 sm:w-10/12 md:w-6/12">
    
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border sm:my-12">
        
            <div class="flex-auto p-4">

                <div class="flex-auto p-4 bg-gradient-to-tl from-teal-800 to-teal-500 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-xl">
                    <p class="text-white font-bold mb-0">User Creation Successfull !</p>
                </div>
                <p class="mt-4 mb-6 leading-normal text-sm text-slate-500 dark:text-white/60 sm:mt-12">If you've selected to receive your password via email, please check account email inbox. Alternatively, you can copy the details below:</p></p>
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4 bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-xl">
                    <h6 class="mb-0 text-white">User Details</h6>
                    <div  id="userDetails" class="flex p-4">
                        <ul class="float-left pl-6 mb-0 list-disc text-slate-100">
                          <li>
                            <span class="leading-normal  text-sm">User Name : {{$user->name}}</span>
                          </li>
                          <li>
                            <span class="leading-normal text-sm">User Email : {{$user->email}}</span>
                          </li>
                          <li>
                            <span class="leading-normal text-sm">User Phone : {{$user->phone}}</span>
                          </li>
                            <li>
                                <span class="leading-normal text-sm">User Password : 
                                    <span id="passwordPlaceholder">*********</span>
                                    <i id="showPassword" class="far fa-eye cursor-pointer ml-2 text-slate-500"></i>
                                    <input type="text" id="hiddenPasswordInput" value="{{$password}}" style="position: absolute; top: -9999px; left: -9999px;">
                                </span>
                            </li>
                        </ul>
                      </div>
                      <div class="flex justify-between p-4">
                        <button id="copyButton" class="text-white" data-clipboard-target="#userDetails">
                            <i class="far fa-copy text-white"></i> copy
                        </button>

                        <a href="{{ route('home') }}" class="text-slate-200 hover:text-slate-200">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                      </div>
                    </div>
                </div>
            </div>
          </div>

      </div>
    </div>

</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var clipboard = new ClipboardJS('#copyButton');

        clipboard.on('success', function (e) {
            var button = e.trigger;
            button.innerHTML = '<i class="text-teal-300 fas fa-check "></i> Copied!';
            setTimeout(function () {
                button.innerHTML = '<i class="text-white far fa-copy"></i> Copy';
            }, 2000); // Reset after 2 seconds
        });

        var passwordPlaceholder = document.getElementById('passwordPlaceholder');
        var showPasswordIcon = document.getElementById('showPassword');

        showPasswordIcon.addEventListener('click', function () {
            // Toggle visibility
            if (passwordPlaceholder.innerHTML === '*********') {
                passwordPlaceholder.innerHTML = '{{$password}}';
                showPasswordIcon.classList.remove('far', 'fa-eye');
                showPasswordIcon.classList.add('far', 'fa-eye-slash');
            } else {
                passwordPlaceholder.innerHTML = '*********';
                showPasswordIcon.classList.remove('far', 'fa-eye-slash');
                showPasswordIcon.classList.add('far', 'fa-eye');
            }
        });
    });
</script>
    
@endpush