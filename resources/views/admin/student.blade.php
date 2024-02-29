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
        </div>
    </div>
    <div class="flex gap-x-2 items-center">
      @if($student->consultant !== null)
        <button type="button" data-toggle="modal" data-target="#appointmentModal" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-blue-700 text-blue-500 hover:text-blue-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>Appoinment</button>
      @endif
        <a href="{{route('editStudent', $student->id)}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i>Update</a>
        <form action="{{ route( 'deleteStudent', $student->id ) }}" id="delete-form-{{ $student->id }}" method="POST">
            @csrf
            <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-red-300 rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $student->id }})">Delete</button>
        </form>
    </div>

    
    </div>

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full justify-center items-center h-full px-3 flex lg:w-4/12">
            <div data-tilt class=" dark:bg-gray-950 dark:shadow-soft-dark-xl after:z-1 relative flex h-full min-w-0 flex-col items-center break-words rounded-2xl border-0  after:absolute after:top-0 after:left-0 after:block after:h-full after:w-full after:rounded-2xl  after:content-['']" style="transform-style: preserve-3d; will-change: transform; transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)">
              <div class="mb-7 absolute h-full w-full rounded-2xl"></div>
                <div class="relative flex-auto text-center text-white z-2">
                    <div id="img-placeholder" class="w-full max-w-full !flex justify-center">
                        @if($student->image_path)
                            <img id="previewImage" class="w-44 mt-4 h-44 rounded-full object-cover" src="{{ asset('/storage/'.$student->image_path) }}" alt="">
                        @else
                            <!-- Placeholder image when student's image path is null -->
                            <img id="placeholderImage" class="w-44 mt-4 h-44 rounded-full object-cover" src="{{ asset('assets/img/user.jpg') }}" alt="Placeholder Image">
                        @endif
                    </div>
                </div>
            </div>
          </div>

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
              <div class="flex-auto px-4 pb-4">
                <hr class="h-px my-3 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  @if(isset($student->name))
                      <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal border-0 rounded-t-lg text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Full Name:</strong> &nbsp; {{$student->name}}
                      </li>
                  @endif
              
                  @if(isset($student->phone))
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Mobile:</strong> &nbsp;{{$student->phone}}
                      </li>
                  @endif
              
                  @if(isset($student->email))
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Email:</strong> &nbsp; {{$student->email}}
                      </li>
                  @endif
              
                  @if(isset($student->address))
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Address:</strong> &nbsp; {{$student->address}}
                      </li>
                  @endif

                  @if(isset($student->birth_date))
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Birth Date:</strong> &nbsp; {{$student->birth_date}}
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
                        <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Guardian Name:</strong> &nbsp; {{$guardian_details->guardian_name}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->profession))
                        <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Profession:</strong> &nbsp; {{$guardian_details->profession}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->phone_number))
                        <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Phone:</strong> &nbsp; {{$guardian_details->phone_number}}
                        </li>
                    @endif
                
                    @if(isset($guardian_details->income))
                        <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                            <strong class="text-slate-700 dark:text-white">Income:</strong> &nbsp; {{$guardian_details->income}}
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
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Gender:</strong> &nbsp; {{$student_details->gender}}
                      </li>
                  @endif
              
                  @if($student_details->blood_group)
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Blood Group:</strong> &nbsp; {{$student_details->blood_group}}
                      </li>
                  @endif
              
                  @if($student_details->previous_school)
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Previos School:</strong> &nbsp; {{$student_details->previous_school}}
                      </li>
                  @endif
              
                  @if($student_details->orphan)
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">Orphan:</strong> &nbsp; {{$student_details->orphan}}
                      </li>
                  @endif
              
                  @if($student_details->religion)
                      <li class="relative block px-4 py-2 pl-0 leading-normal border-0 border-t-0 text-sm text-inherit">
                          <strong class="text-slate-700 dark:text-white">religion:</strong> &nbsp; {{$student_details->religion}}
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