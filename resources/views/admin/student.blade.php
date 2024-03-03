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

  @if($errors->any())
    <div class="bg-red-400 text-white rounded-3 p-6 my-5">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> 
    </div>
  @endif
  <div class="justify-between flex w-full sm:flex pb-4">
    <div class="flex w-full flex-wrap -mx-3">
        <div class="w-full flex max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
            <h4 class="dark:text-white mx-3 text-lg">{{$student->name}} </h4>
            <span>
              <td class="font-semibold leading-tight text-xs">
                <div class="flex flex-wrap gap-4 max-w-48 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                        @if($student->medium)
                            <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-green-200 text-slate-650 align-baseline font-bold uppercase leading-none">{{ $student->medium }}</span>
                        @endif
                </div>
            </td>
            </span>
        </div>
    </div>
    <div class="flex gap-x-2 items-center">
        <a href="{{route('editStudent', $student->id)}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>Update</a>
        <form action="{{ route( 'deleteStudent', $student->id ) }}" id="delete-form-{{ $student->id }}" method="POST">
            @csrf
            <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-red-300 rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $student->id }})">Delete</button>
        </form>
    </div>
    </div>

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        
        <div class="w-full max-w-full mb-6 flex-0">
          <div class="flex flex-wrap  items-start w-full text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
            
            <div class="flex gap-12 mb-4 lg:w-8/12 justify-between w-full">
            
            <div  class=" dark:bg-gray-950 dark:shadow-soft-dark-xl after:z-1 relative flex h-full min-w-0  items-center break-words rounded-2xl border-0   after:h-full  ">
              <div class=" h-full  w-full rounded-2xl"></div>
                <div class=" text-center text-white">
                    <div id="img-placeholder" class="w-full max-w-full !flex justify-center">
                        @if($student->image_path)
                            <img id="previewImage" class="w-32 h-32 rounded-full object-cover" src="{{ asset('/storage/'.$student->image_path) }}" alt="">
                        @else
                            <!-- Placeholder image when student's image path is null -->
                            <img id="placeholderImage" class="w-32 h-32 rounded-full object-cover" src="{{ asset('assets/img/user.jpg') }}" alt="Placeholder Image">
                        @endif
                    </div>
                </div>
            </div>

            <div class=" max-w-full w-full">
              <div class="relative flex items-center  h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto items-center w-full px-4">
                  <ul class="block items-center justify-between pl-0 mb-0 rounded-lg">
                    @if(isset($student->schoolClass))
                        <li class="flex items-center justify-between  py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Class name:</strong> &nbsp;

                            <span>
                              <td class="font-semibold leading-tight text-xs">
                                <div class="flex flex-wrap  max-w-48 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                                        @if($student->schoolClass)
                                            <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-slate-200 text-slate-650 align-baseline font-bold uppercase leading-none">{{ $student->schoolClass->name }}</span>
                                        @endif
                                </div>
                              </td>
                            </span>

                        </li>
                    @endif

                    @if(isset($student->schoolClass))
                    <li class="flex items-center justify-between  py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                        <strong class="text-slate-700 dark:text-white">Teacher:</strong> &nbsp;

                        <span>
                          <td class="font-semibold leading-tight text-xs">
                            <div class="flex flex-wrap gap-4 max-w-48 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                                  <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-blue-200 text-slate-650 align-baseline font-bold uppercase leading-none">{{ $student->schoolClass->teacher->name }}</span>
                            </div>
                          </td>
                        </span>

                    </li>
                @endif
              
                </ul>
                
                </div>
              </div>
            </div>
            </div>

            

        

            
              <div class="flex lg:w-4/12 pl-4 justify-end w-full ">
                  <label for="plan-growth" class="relative w-full  flex flex-col bg-white p-5 rounded-lg shadow-md cursor-pointer">
                  <span class="font-semibold text-gray-500 leading-tight uppercase mb-3">Nenamal Royal <br> College - {{$student->location->name}}</span>
                  <input type="radio" name="location" id="plan-growth" value="1" class="absolute h-0 w-0 appearance-none" checked />
                  <span aria-hidden="true" class="hidden absolute inset-0 border-2 border-blue-500 bg-blue-200 bg-opacity-10 rounded-lg">
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
          

          @if($student)
          <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <div class="flex flex-wrap -mx-3">
                  <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                    <h6 class="mb-0 dark:text-white">Profile Information</h6>
                  </div>
                </div>
              </div>
              <div class="flex-auto px-4">
                <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  @if(isset($student->name))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Full Name:</strong> &nbsp; {{$student->name}}
                      </li>
                  @endif

                  @if(isset($student->admission_date))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Admission Date:</strong> &nbsp; {{$student->admission_date}}
                      </li>
                  @endif

                  @if(isset($student->admission_id))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Admission Id:</strong> &nbsp; {{$student->admission_id}}
                      </li>
                  @endif

                  @if(isset($student->address))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Address:</strong> &nbsp; {{$student->address}}
                      </li>
                  @endif

                  @if(isset($student->birth_date))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Birth Date:</strong> &nbsp; {{$student->birth_date}}
                      </li>
                  @endif

                  @if(isset($student->age))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Age:</strong> &nbsp; {{$student->age}}
                      </li>
                  @endif
                 
              </ul>
              
              </div>
            </div>
          </div>

        @endif

        @if($student_details)
          <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                <div class="flex flex-wrap -mx-3">
                  <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                    <h6 class="mb-0 dark:text-white">Advance Information</h6>
                  </div>
                 
                </div>
              </div>
              <div class="flex-auto px-4 pb-4">
                <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  @if($student_details->student_nic)
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Student BirthId/NIC:</strong> &nbsp; {{$student_details->student_nic}}
                      </li>
                  @endif
              
                  @if($student_details->gender)
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Gender:</strong> &nbsp; {{$student_details->gender}}
                      </li>
                  @endif
              
                  @if($student_details->blood_group)
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Blood Group:</strong> &nbsp; {{$student_details->blood_group}}
                      </li>
                  @endif
              
                  @if($student_details->previous_school)
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Previos School:</strong> &nbsp; {{$student_details->previous_school}}
                      </li>
                  @endif
              
                  @if($student_details->orphan)
                      <li class="relative block px-4 py-2 pl-0 pt-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Orphan:</strong> &nbsp; {{$student_details->orphan}}
                      </li>
                  @endif
              
                  @if($student_details->religion)
                      <li class="relative block px-4 py-2 pl-0 pt-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">religion:</strong> &nbsp; {{$student_details->religion}}
                      </li>
                  @endif
              </ul>
              </div>
            </div>
          </div>
          @endif


          @if($guardian_details)
            <div class="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
              <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
                  <div class="flex flex-wrap -mx-3">
                    <div class="flex items-start w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                      <h6 class="mb-0 dark:text-white">Guardian Information</h6>
                    </div>
                  </div>
                </div>
                <div class="flex-auto px-4 pb-4">
                  <hr class="h-px bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @if(isset($guardian_details->guardian_role))
                        <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Role:</strong> &nbsp; {{$guardian_details->guardian_role}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->guardian_name))
                        <li class="relative block px-4 pt-0 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Guardian Name:</strong> &nbsp; {{$guardian_details->guardian_name}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->profession))
                        <li class="relative block px-4 pt-0 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Profession:</strong> &nbsp; {{$guardian_details->profession}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->phone_number))
                        <li class="relative block px-4 pt-0 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Phone:</strong> &nbsp; {{$guardian_details->phone_number}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->whatsapp_number))
                        <li class="relative block px-4 pt-0 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Whatsapp No:</strong> &nbsp; {{$guardian_details->whatsapp_number}}
                        </li>
                    @endif
                </ul>                
                </div>
              </div>
            </div>
          @endif

        </div>
      </div>
     

    </div>

    <div class="w-full py-3 mx-auto">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
          
        </div>
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
  document.addEventListener('DOMContentLoaded', function () {
      // Get today's date in 'YYYY-MM-DD' format
      const today = new Date().toISOString().split('T')[0];

      // Initialize Flatpickr and set the default date
      flatpickr('#paymentUpdateDate', {
          minDate: '{{ now()->format('Y-m-d') }}',
          dateFormat: 'Y-m-d',
          // Add any other Flatpickr options you may need
      });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Get today's date in 'YYYY-MM-DD' format
      const today = new Date().toISOString().split('T')[0];

      // Initialize Flatpickr and set the default date
      flatpickr('#paymentDate', {
          defaultDate: today,
          minDate: '{{ now()->format('Y-m-d') }}',
          dateFormat: 'Y-m-d',
          // Add any other Flatpickr options you may need
      });
  });
</script>

<script>
  function toggleAppoinmentContainer(checkbox) {
    const appoinmentContainer = document.getElementById('appoinment-container');
    appoinmentContainer.style.display = checkbox.checked ? 'block' : 'none';
  }
</script>


<script>
  function setStudentAppointmentId(button) {
      var appointmentId = button.getAttribute('data-appointment-id');
      document.getElementById('appointment-id-input').value = appointmentId;

      // Now, you can open the student status modal
      var modal = document.getElementById('updateStudentStat');
      modal.classList.remove('hidden');
      modal.classList.add('opacity-100');
  }

  function setAppointmentId(button) {
      var appointmentId = button.getAttribute('data-appointment-id');
      document.getElementById('id-input').value = appointmentId;

      // Now, you can open the appointment status modal
      var modal = document.getElementById('updateAppointmentStat');
      modal.classList.remove('hidden');
      modal.classList.add('opacity-100');
  }

  function closeStudentModal() {
      // Close the student status modal
      var modal = document.getElementById('updateStudentStat');
      modal.classList.add('hidden');
      modal.classList.remove('opacity-100');
  }

  function closeAppointmentModal() {
      // Close the appointment status modal
      var modal = document.getElementById('updateAppointmentStat');
      modal.classList.add('hidden');
      modal.classList.remove('opacity-100');
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const positiveRadio = document.getElementById('plan-growth');
    const negativeRadio = document.getElementById('plan-hobby');
    const noteToggleCheckbox = document.getElementById('note-switch');
    const noteTitle = document.getElementById('note-title');
    const noteDescription = document.getElementById('note');
    const reasonDropdown = document.getElementById('reason-drop');
    const noteCheckContainer = document.getElementById('note-check-container');

    // Initially hide the note title, note description, reason dropdown, and the note-check-container
    noteTitle.style.display = 'none';
    noteDescription.style.display = 'none';
    noteCheckContainer.style.display = 'block';

    // Add change event listener to the note toggle checkbox
    noteToggleCheckbox.addEventListener('change', function () {
      // Toggle the display of note title and note description based on the checkbox state
      if (noteToggleCheckbox.checked) {
        noteTitle.style.display = 'block';
        noteDescription.style.display = 'block';
      } else {
        noteTitle.style.display = 'none';
        noteDescription.style.display = 'none';
      }
    });
    
  });
</script>



<script>
  $(document).ready(function () {
      // Trigger form submission when file input changes
      $('#agreementInput').change(function () {
          $('#uploadForm').submit();
      });
  });
</script>

<script>
  function confirmDelete(studentId) {
      Swal.fire({
          title: 'Are you sure?',
          text: 'You won\'t be able to revert this!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              // Use a form to submit the delete request
              var form = document.createElement('form');
              form.setAttribute('method', 'post');
              form.setAttribute('action', `/delete-agreement/${studentId}`);
              form.setAttribute('style', 'display: none;');
              form.innerHTML = '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="POST">';
              document.body.appendChild(form);
              form.submit();
          }
      });
  }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const showSweetAlert = urlParams.get('showSweetAlert');

    if (showSweetAlert) {
        // Show SweetAlert on page load
        Swal.fire({
            icon: 'success',
            title: 'Student added successfully!',
            showConfirmButton: false,
            timer: 1500
        });
    }
});

</script>

@if(session('showSweetAlert'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show SweetAlert on page load
            Swal.fire({
                icon: 'success',
                title: 'Student added successfully!',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
@endif



@endpush