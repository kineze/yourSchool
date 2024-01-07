@extends('admin.layouts.app')

@section('content')

    <div class="px-7 pt-10 flex">
        <button type="button" data-toggle="modal" data-target="#timeSlots" class="inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border-fuchsia-500 text-fuchsia-500 hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-fuchsia-500 active:bg-fuchsia-500 active:text-white hover:active:border-fuchsia-500 hover:active:bg-transparent hover:active:text-fuchsia-500 hover:active:opacity-75">New Slot</button>
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
    
    <div class="flex-none w-full max-w-full px-3">
            
        <div class="flex flex-wrap mt-2  lg:mt-6">
            @foreach ($timeSlots as $timeSlot)
                <div class="w-full h-full max-w-full px-3 mb-6 md:flex-0 shrink-0 md:w-6/12 lg:w-4/12">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                        <div class="flex">
                            {{-- <div class="w-19 h-19 text-base ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 inline-flex items-center justify-center rounded-lg p-2 text-white transition-all duration-200">
                                <img class="w-full" src="{{asset('/assets/img/small-logos/vaccine.svg')}}" alt="Image placeholder" />
                            </div> --}}
                            <div class="my-auto ml-4">
                                <h5 class="dark:text-white font-bold uppercase">{{ $timeSlot->name }}</h5>
                            <div>
                                <h6 class="dark:text-white"></h6>
                            </div>
                        </div>
                         
                        </div>
                        <div class="p-4">
                            <p class="mb-2 font-semibold leading-tight text-sm">Start Time: <span class=" text-slate-700 dark:text-white sm:ml-2">{{ $timeSlot->start_time }}</span></p>
                            <p class="mb-2 font-semibold leading-tight text-sm">End Time: <span class=" text-slate-700 dark:text-white sm:ml-2">{{ $timeSlot->end_time }}</span></p>
                        </div>
                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                            <div class="flex flex-wrap w-full justify-between -mx-3">
                                <div class="max-w-full px-3 text-right flex-0">
                                    <h6 class="mb-0 leading-normal text-sm"></h6>
                                    
                                </div>
                                <div class="flex">

                                    <button type="button" data-toggle="modal" data-target="#timeSlot-{{$timeSlot->id}}" class="inline-block px-4 mx-2 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-fuchsia-400  hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-fuchsia-400 hover:bg-transparent hover:text-fuchsia-400  hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500">Update</button>

                                    <form action="{{ route('destroytimeSlot',$timeSlot->id) }}" id="delete-form-{{ $timeSlot->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $timeSlot->id }})">Delete</button>
                                    </form>
                                </div>
                                
                            </div>

                            <div class="fixed top-1/10 m-5 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="timeSlot-{{$timeSlot->id}}" aria-hidden="true">
                                <div class="flex flex-wrap mt-12 p-12">
                                <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-4/12">
                                    <form class="relative mb-32 " id="vaccine-form"  action="{{ route('updateTimeSlot', $timeSlot->id) }}" method="post">
                                        @csrf
                                        <div active form="info" class="
                                            flex flex-col visible p-12 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                                            <h5 class="mb-0 font-bold dark:text-white text-md uppercase">Update {{ $timeSlot->name }} Slot</h5>
                                            <div>
                                                <div class="flex flex-wrap mt-4 -mx-3">
                                                    <div class="w-full max-w-full px-3 flex-0">
                                                        <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Slot Name</label>
                                                        <input type="text" name="name" value="{{ $timeSlot->name }}" placeholder="Admin UserName" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                    </div> 
                                                </div>
                        
                                                <div class="flex flex-wrap mt-4 -mx-3">
                                                    <div class="w-full max-w-full px-3 flex-0">
                                                        <label class="mb-2 ml-1 mt-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">Start Time</label>
                                                        <input datetimepicker name="start_time" value="{{ $timeSlot->start_time }}" id="startTimePicker-{{$timeSlot->id}}" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                                                    </div>
                                                    <div class="w-full max-w-full px-3 flex-0">
                                                        <label class="mb-2 ml-1 mt-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">End Time</label>
                                                        <input datetimepicker name="end_time" value="{{ $timeSlot->end_time }}" id="endTimePicker-{{$timeSlot->id}}" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                                                    </div>
                                                </div>
                        
                                                <div class="flex justify-end mt-10">
                                                    <button type="button" data-toggle="modal" data-target="#timeSlot-{{$timeSlot->id}}" class="inline-block px-6 py-3 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-slate-600 to-slate-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Close</button>
                                                    <button type="submit" aria-controls="media" next-form-btn href="javascript:;" class="inline-block px-6 m-1 py-3 mb-4 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update Slot</button>
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
            @endforeach
        </div>
    </div>

    <div class="fixed top-1/10 m-5 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto transition-opacity ease-linear opacity-0 z-sticky outline-0" id="timeSlots" aria-hidden="true">
        <div class="flex flex-wrap mt-12 p-12">
        <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-4/12">
            <form class="relative mb-32 " id="vaccine-form"  action="{{ route('newTimeSlot') }}" method="post">
                @csrf
                <div active form="info" class="
                    flex flex-col visible p-12 w-full h-auto min-w-0 first-letter:break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                    <h5 class="mb-0 font-bold dark:text-white">New time slot</h5>
                    <div>
                        <div class="flex flex-wrap mt-4 -mx-3">
                            <div class="w-full max-w-full px-3 flex-0">
                                <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="name">Slot Name</label>
                                <input type="text" name="name" placeholder="Admin UserName" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                            </div> 
                        </div>

                        <div class="flex flex-wrap mt-4 -mx-3">
                            <div class="w-full max-w-full px-3 flex-0">
                                <label class="mb-2 ml-1 mt-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">Start Time</label>
                                <input datetimepicker name="start_time"  id="startTimePicker"  class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                            </div>
                            <div class="w-full max-w-full px-3 flex-0">
                                <label class="mb-2 ml-1 mt-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">End Time</label>
                                <input datetimepicker name="end_time"  id="endTimePicker"  class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                            </div>  
                        </div>

                        <div class="flex justify-end mt-10">
                            <button type="button" data-toggle="modal" data-target="#timeSlots" class="inline-block px-6 py-3 m-1 mb-4 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-slate-600 to-slate-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Close</button>
                            <button type="submit" aria-controls="media" next-form-btn href="javascript:;" class="inline-block px-6 m-1 py-3 mb-4 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Add Slot</button>
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

document.addEventListener('DOMContentLoaded', function () {
    const endDatePicker = document.getElementById('startTimePicker');

    flatpickr(endDatePicker, {
        enableTime: true,
        noCalendar: true, // Disable the date picker
        dateFormat: "H:i:S", // Include seconds
    });
});

</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const endDatePicker = document.getElementById('endTimePicker');

    flatpickr(endDatePicker, {
        enableTime: true,
        noCalendar: true, // Disable the date picker
        dateFormat: "H:i:S", // Include seconds
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr for each time picker input
        @foreach ($timeSlots as $timeSlot)
        flatpickr("#startTimePicker-{{ $timeSlot->id }}", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i:S",
            defaultDate: "{{ $timeSlot->start_time }}",
        });

        flatpickr("#endTimePicker-{{ $timeSlot->id }}", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i:S",
            defaultDate: "{{ $timeSlot->end_time }}",
        });
        @endforeach
    });
</script>

    
@endpush

