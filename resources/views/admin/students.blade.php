@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <div class="justify-between flex w-full sm:flex pb-2">
    <div class="flex w-full flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
            <h4 class="dark:text-white mx-3 text-lg">All Users</h4>
        </div>
    </div>
    <div>
        <a href="{{route('newStudent')}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i> New Student</a>
    </div>
     
      <div class="flex">
      <div class="p-2">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <div class="flex items-center">
                                <div class="min-h-6 pl-7 mb-0.5 block">
                                    <span class="my-2 leading-tight text-xs">{{ $student->id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold">
                            <span class="my-2 leading-tight text-xs">{{ $student->name }}</span>
                        </td>
                        <td class="font-semibold leading-tight text-xs">
                            <div class="flex items-center">
                                <span class="my-2 leading-tight text-xs">{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="font-semibold leading-tight text-xs">
                            <div class="flex items-center">
                                <span class="my-2 leading-tight text-xs">{{ $user->phone }}</span>
                            </div>
                        </td>
                      
                        <td class="flex justify-end gap-x-3">
                            <a href="{{route('student', $student->id )}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-slate-800 text-slate-800 hover:border-black hover:bg-transparent hover:text-black hover:opacity-75 hover:shadow-none active:bg-gray-700 active:text-white active:hover:bg-transparent active:hover:text-black">View</a>
                            <a href="{{route('editStudent', $student->id )}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-blue-300 text-blue-500 hover:border-black hover:bg-transparent hover:text-black hover:opacity-75 hover:shadow-none active:bg-gray-700 active:text-white active:hover:bg-transparent active:hover:text-black">Edit</a>
                            <form action="{{ route( 'deleteStudent', $student->id ) }}" id="delete-form-{{ $student->id }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $student->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
          </div>
        </div>
      </div>

    </div>
</div>
    
@endsection