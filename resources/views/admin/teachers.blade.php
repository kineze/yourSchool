@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <div class="justify-between flex w-full sm:flex pb-2">
    <div class="flex w-full flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
            <h4 class="dark:text-white mx-3 text-lg">All Teachers</h4>
        </div>
    </div>
    <div>
        <a href="{{route('newTeacher')}}" class="whitespace-nowrap inline-block px-8 py-2 font-bold text-center uppercase align-middle transition-all bg-transparent border-solid rounded-lg shadow-none cursor-pointer active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:scale-102 active:shadow-soft-xs border border-orange-700 text-orange-500 hover:text-orange-500 hover:opacity-75 hover:shadow-none active:scale-100 active:border-orange-500 active:bg-orange-500 active:text-white hover:active:border-orange-500 hover:active:bg-transparent hover:active:text-orange-500 hover:active:opacity-75"><i class="fas fa-plus mr-2"></i> New Teacher</a>
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
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="flex items-center">
                                <div class="min-h-6 pl-7 mb-0.5 block">
                                    <span class="my-2 leading-tight text-xs">{{ $user->id }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="font-semibold">
                            <span class="my-2 leading-tight text-xs">{{ $user->name }}</span>
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
                        <td class="font-semibold leading-tight text-xs">
                            <div class="flex flex-wrap gap-4 max-w-48 sm:flex-0 shrink-0 sm:mt-0 sm:ml-auto sm:w-auto">
                                @foreach($user->roles as $role)
                                    @if($role->name === 'Admin')
                                        <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-slate-200 text-slate-650 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                                    @elseif($role->name === 'Manager')
                                        <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-lime-200 text-lime-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                                    @elseif($role->name === 'Coordinator')
                                        <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-orange-200 text-orange-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                                    @elseif($role->name === 'Teacher')
                                        <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-teal-200 text-teal-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                                    @elseif($role->name === 'Finance')
                                        <span class="py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-violet-200 text-violet-600 align-baseline font-bold uppercase leading-none">{{ $role->name }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="flex justify-end gap-x-3">
                            <a href="{{route('getUpdateUser', $user->id )}}" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-gray-800 text-gray-800 hover:border-black hover:bg-transparent hover:text-black hover:opacity-75 hover:shadow-none active:bg-gray-700 active:text-white active:hover:bg-transparent active:hover:text-black">Edit</a>
                            <form action="{{ route( 'deleteUser', $user->id ) }}" id="delete-form-{{ $user->id }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-block px-4 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs text-red-500 hover:scale-102 active:shadow-soft-xs tracking-tight-soft hover:border-red-500 hover:bg-transparent hover:text-red-500 hover:opacity-75 hover:shadow-none active:bg-red-500 active:text-white active:hover:bg-transparent active:hover:text-red-500" onclick="ConfirmDelete(event, {{ $user->id }})">Delete</button>
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