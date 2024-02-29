@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <div class="relative flex flex-col flex-auto min-w-0 p-4 mb-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border" id="profile">
        <div class="flex flex-wrap items-center justify-center -mx-3">
            <div class="w-4/12 max-w-full px-3 my-auto flex-0 sm:w-auto">
                <div class="h-full">
                    <h5 class="mb-1 font-bold dark:text-white">Students</h5>
                    <p class="mb-0 font-semibold leading-normal text-sm">Students / All Students</p>
                </div>
                </div>
                <div class="flex lg:w-8/12 max-w-full px-6 mt-4 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
            <div class="flex w-full flex-wrap mt-4 -mx-3">
                <div class="w-full hidden max-w-full px-3 flex-0 lg:w-4/12">
                    <select choice name="inquiryType" id="choices-inquriy">
                        <option value="">all</option>
                        <option value="inactive">Active</option>
                        <option value="negative_inquiry">Inactive</option>
                    </select>
                </div>
                <div class="w-full max-w-full flex items-center px-3 flex-0 lg:w-6/12">
                    <label class=" mr-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">From</label>
                    <input datetimepicker name="start_date"  id="startDatePicker" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                </div>
                <div class="w-full max-w-full flex items-center px-3 flex-0 lg:w-6/12">
                    <label class=" mr-4 font-bold text-xs text-slate-700 dark:text-white/80" for="Address 2">To</label>
                    <input datetimepicker name="end_date"  id="endDatePicker" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Please select a date" />
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="overflow-x-auto">
            <table class="table table-flush" datatable id="datatable-search-list">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>counselor</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table> 
            <div class="flex justify-center py-4 items-center" id="paginationContainer"></div>           
          </div>
        </div>
      </div>

    </div>
</div>
    
@endsection

@push('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function () {
        // Get today's date
        const today = new Date();

        // Set the time to 00:00 for the start date
        today.setHours(0, 0, 0, 0);

        // Set the time to 23:59 for the end date
        const endOfDay = new Date(today);
        endOfDay.setHours(23, 59, 59, 999);

        // Retrieve stored values or use defaults
        const storedStartDate = localStorage.getItem('startDate') || today.toISOString().split('T')[0];
        const storedEndDate = localStorage.getItem('endDate') || endOfDay.toISOString().split('T')[0];
        const storedStudentType = localStorage.getItem('studentType') || '';

        const startDatePicker = flatpickr('#startDatePicker', {
            defaultDate: storedStartDate,
            onChange: handleDateRangeChange // Use onChange directly
        });

        const endDatePicker = flatpickr('#endDatePicker', {
            defaultDate: storedEndDate,
            onChange: handleDateRangeChange // Use onChange directly
        });

        // Use change event on the select element
        const inquiryTypeSelect = document.getElementById('choices-inquriy');
        inquiryTypeSelect.value = storedStudentType; // Set the stored value
        inquiryTypeSelect.addEventListener('change', handleDateRangeChange);

        // Fetch data initially with the stored date range and student type
        handleDateRangeChange(storedStartDate, storedEndDate, storedStudentType);
    });

    function handleDateRangeChange(selectedDates, dateStr, instance) {
        const startDate = document.getElementById('startDatePicker').value;
        const endDate = document.getElementById('endDatePicker').value;

        // Use the select element directly
        const studentType = document.getElementById('choices-inquriy').value;

        // Store values in localStorage
        localStorage.setItem('startDate', startDate);
        localStorage.setItem('endDate', endDate);
        localStorage.setItem('studentType', studentType);

        axios.post('/get-students-by-date-range', {
            start_date: startDate + ' 00:00:00',
            end_date: endDate + ' 23:59:59',
            student_type: studentType
        })
        .then(response => {
            updateTable(response.data);
        })
        .catch(error => {
            console.error('Error fetching filtered data:', error);
        });
    }

    function updateTable(paginatedData) {
        const tableBody = document.querySelector('#datatable-search-list tbody');
        tableBody.innerHTML = '';

        paginatedData.data.forEach(student => {
            const row = `<tr>
                            <td>
                                <div class="flex items-center">
                                    <div class="min-h-6 pl-7 mb-0.5 block">
                                        <span class="my-2 leading-tight text-xs">${student.id}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="font-semibold">
                                <span class="my-2 leading-tight text-xs">${student.name}</span>
                            </td>
                            <td class="font-semibold leading-tight text-xs">
                                <div class="flex items-center">
                                    <span class="my-2 leading-tight text-xs">${student.email}</span>
                                </div>
                            </td>
                            <td class="font-semibold leading-tight text-xs">
                                <div class="flex items-center">
                                    <span class="my-2 leading-tight text-xs">${student.phone}</span>
                                </div>
                            </td>

                            <td class="font-semibold leading-tight text-xs">
                                <div class="flex items-center">
                                    ${student.consultant_id !== null ?
                                        `<span class="m-2 inline-block rounded-full border border-blue-600 px-2.5 w-19 text-center py-1 text-xs font-medium text-blue-600">TRUE</span>` :
                                        `<span class="m-2 inline-block rounded-full border border-red-600 px-2.5 w-19 text-center py-1 text-xs font-medium text-red-600">FALSE</span>`
                                    }
                                </div>
                            </td>

                            <td class="font-semibold leading-tight text-xs">
                                <span class="font-semibold leading-tight flex items-center justify-center   dark:text-white text-xs">
                                    ${student.student_type === 'fresh_inquiry' ?
                                        `<span class="m-2 inline-block rounded-full border text-center w-19 px-2.5 py-1 text-xs font-medium bg-gradient-to-tl from-blue-600 to-cyan-400 text-white">Fresh</span>` :
                                        (student.student_type === 'positive_inquiry' ?
                                            `<span class="m-2 inline-block rounded-full text-center w-19 px-2.5 py-1 text-xs font-medium bg-gradient-to-tl from-green-600 to-lime-400 text-white">Positive</span>` :
                                            `<span class="m-2 inline-block text-center rounded-full w-19 px-2.5 py-1 text-xs font-medium bg-gradient-to-tl from-red-600 to-rose-400 text-white">Negative</span>`
                                        )
                                    }
                                </span>
                            </td>

                            <td class="font-semibold leading-tight text-sm">
                                <div class="flex items-center gap-x-3">
                                    <a href="/student/${student.id}"> <i class="fas fa-eye text-slate-400 dark:text-white/70" aria-hidden="true"></i></a>
                                    <a href="edit-student/${student.id}"><i class="fas fa-pencil-alt text-slate-400 dark:text-white/70" aria-hidden="true"></i></a>
                                    <form action="/delete-student/${student.id}" id="delete-form-${student.id}" method="POST">
                                        @csrf
                                        <button type="submit" onclick="ConfirmDelete(event, ${student.id})"><i class="fas fa-trash text-slate-400 dark:text-white/70" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>`;
            tableBody.innerHTML += row;
        });

        // Add pagination links
        const paginationLinks = generatePaginationLinks(paginatedData);
        const paginationContainer = document.querySelector('#paginationContainer');
        paginationContainer.innerHTML = paginationLinks;
    }

    function generatePaginationLinks(paginatedData) {
        let links = '';

        // Show "First" button
        links += `<li class="page-item px-2 py-1 border border-orange-500 rounded-lg">
                    <a class="text-orange-500 page-link" href="#" onclick="loadPage(1)">
                        <i class="fas fa-angle-double-left"></i> First
                    </a>
                  </li>`;

        // Show "Previous" button
        links += `<li class="page-item px-2 py-1 border border-orange-500 rounded-lg">
                    <a class="text-orange-500 page-link" href="#" onclick="loadPage(${paginatedData.current_page - 1})">
                        <i class="fas fa-angle-left"></i> Previous
                    </a>
                  </li>`;

        // Show ellipsis if there are many pages
        if (paginatedData.last_page > 5) {
            links += `<li class="page-item px-2 py-1 border border-orange-500 rounded-lg">...</li>`;
        }

        // Generate pagination links
        for (let i = Math.max(1, paginatedData.current_page - 2); i <= Math.min(paginatedData.last_page, paginatedData.current_page + 2); i++) {
            links += `<li class="page-item px-3 py-1 ${i === paginatedData.current_page ? 'bg-orange-500 border-0.4 border-orange-500' : 'border-0.4 border-orange-500'} rounded-lg">
                        <a class="${i === paginatedData.current_page ? 'text-white' : 'text-orange-500'} page-link" href="#" onclick="loadPage(${i})">${i}</a>
                      </li>`;
        }

        // Show ellipsis if there are many pages
        if (paginatedData.last_page > 5 && paginatedData.current_page + 2 < paginatedData.last_page) {
            links += `<li class="page-item  px-2 py-1 border border-orange-500 rounded-lg">...</li>`;
        }

        // Show "Next" button
        links += `<li class="page-item  px-2 py-1 border border-orange-500 rounded-lg">
                    <a class="text-orange-500 page-link" href="#" onclick="loadPage(${paginatedData.current_page + 1})">
                        Next <i class="fas fa-angle-right"></i>
                    </a>
                  </li>`;

        // Show "Last" button
        links += `<li class="page-item  px-2 py-1 border border-orange-500 rounded-lg">
                    <a class="text-orange-500 page-link" href="#" onclick="loadPage(${paginatedData.last_page})">
                        Last <i class="fas fa-angle-double-right"></i>
                    </a>
                  </li>`;

        return `<ul class="flex items-center gap-x-4">${links}</ul>`;
    }

    function loadPage(pageNumber) {
        const startDate = document.getElementById('startDatePicker').value;
        const endDate = document.getElementById('endDatePicker').value;

        axios.post('/get-students-by-date-range?page=' + pageNumber, { start_date: startDate + ' 00:00:00', end_date: endDate + ' 23:59:59' })
            .then(response => {
                updateTable(response.data);
            })
            .catch(error => {
                console.error('Error fetching paginated data:', error);
            });
    }
</script>


@endpush