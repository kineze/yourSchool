
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/threejs.js')}}"></script>
<script src="{{asset('/assets/js/plugins/orbit-controls.js')}}"></script>
<script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/choices.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/datatables.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/quill.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/flatpickr.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('/assets/js/plugins/dropzone.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
</script>

<script>
  // Make sure this code is placed after including the Flatpickr library and the form HTML
  
  document.addEventListener("DOMContentLoaded", function () {
      flatpickr("#voucherDate", {
          allowInput: true,
          minDate: "today",
          dateFormat: "Y-m-d", // Set the desired date format
      });
  });
  
  </script>

<script>
    function ConfirmDelete(event, id) {
        event.preventDefault();
    
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
    </script>

<script>
    function confirmReject(event, url) {
      event.preventDefault(); // Prevent the link from being followed
      Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to reject this voucher.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reject it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  
    function confirmApprove(event, url) {
      event.preventDefault(); // Prevent the link from being followed
      Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to approve this voucher.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    }
  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- main script file  -->
<script src="{{asset('/assets/js/soft-ui-dashboard-pro-tailwind.js?v=1.0.1')}}"></script>

<script>
  $(document).ready(function () {
      var $searchInput = $('input[name="studentSearch"]');
      var $searchResults = $('#search-results');

      $searchInput.on('input', function () {
          var query = $(this).val();

          if (query.trim() === '') {
              $searchResults.empty(); // Clear and hide the results
              return;
          }

          $.ajax({
              url: '{{ route("search.students") }}',
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  query: query
              },
              success: function (data) {
                  // Update the content of the specified div with the search results
                  renderResults(data.results, $searchResults);
              },
              error: function (error) {
                  console.error(error);
              }
          });
      });

      $(document).on('click', function (event) {
          // Close the result list when clicking outside the search input and results
          if (!$(event.target).closest($searchInput).length && !$(event.target).closest($searchResults).length) {
              $searchResults.empty(); // Clear and hide the results
          }
      });

      function renderResults(results, $targetDiv) {
          // Clear previous results
          $targetDiv.empty();

          // Append the wrapper element
          var wrapperElement = $('<div id="result-wrapper" class="bg-white max-h-90 overflow-y-auto w-full shadow-soft-lg p-4 rounded-2"></div>');
          $targetDiv.append(wrapperElement);

          if (results.length > 0) {
              // Implement the rendering logic with styles
              results.forEach(function (result) {
                  // Example: Append results within the wrapper element
                  var resultItem = $(`
                      <div class="relative flex mb-2 rounded-t-inherit items-center border-b-px border-gray-400 dark:bg-transparent">
                          <div class="flex flex-col">
                              <h6 class="mb-0 leading-normal text-sm dark:text-white">${result.name} - ${result.phone}</h6>
                          </div>
                          <div class="ml-auto my-2 text-right">
                              <a href="/student/${result.id}" class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-full shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-black text-white hover:scale-102 active:opacity-85 bg-x-25 text-orange-500 dark:text-white">
                                  <i class="mr-2 fas fa-pencil-alt text-white" aria-hidden="true"></i>View
                              </a>
                          </div>
                      </div>
                  `);
                  wrapperElement.append(resultItem);
              });
          } else {
              // Append an alternative element with a link to open a new student view
              var noResultElement = $(`
                  <div class="text-center text-gray-500">
                      <p>No results found. <a class="px-4 py-2 bg-slate-500 rounded-full text-white" href="{{ route('newStudent') }}">Create a new student</a></p>
                  </div>
              `);
              wrapperElement.append(noResultElement);
          }
      }
  });

</script>