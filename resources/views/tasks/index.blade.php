@extends('tasks.layouts.app')
@section('title','Tâches a effectuer')
@section('main')

<form action="{{route('logout')}}" method="POST">
    @csrf
    {{-- aller dans navigation.blade.php dans views.auth et prendre le href --}}
    {{-- <a type="button" href="{{route('dashboard')}}" class="text-white bg-blue-800 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Connexion</a> --}}
    <a type="button" href="{{route('logout')}}"onclick="event.preventDefault();this.closest('form').submit();" class="text-white bg-green-400 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
        {{ __('Connexion') }}
    </a>

   </form>




<form method="POST" action="{{route('ajouter')}}" class="rounded-md  justify-items-center box-border h-56 w-full text-center bg-blue-300">
   {{-- @csrf est la sécurité --}}
    @csrf
    <h1 >Tâches a Faire</h1>
    <div class="inline-flex  gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900"></label>
            <input type="text"  name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="vos tâches" required />

            <label for="description" class="block mb-1 text-sm font-medium text-gray-900"></label>
            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Description de tâche(s)"></textarea>

            <button type="submit" class="mt-2 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 mb-2">Ajouter</button>
        </div>
</form>
@endsection

@section('table')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tâches a réaliser
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                   {{$task->title}}
                </th>
                <td class="px-6 py-4">
                    {{$task->description}}
                </td>
                <td class="px-6 py-4">
                    {{$task->status}}
                </td>
                <td class="px-6 py-4 text-right">

                    <button href="{{$task->id}}" class="font-medium mb-5 rounded-full text-sm  px-7 py-2.5 text-white bg-blue-500 hover:bg-blue-700 hover:underline">modifier</button>
                    {{-- mettre la methode destroy avec ces arguments $task->id --}}
                    <form action='{{route('/supprimer', $task->id)}}' method="POST">
                        @csrf
                        <button  class="text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-red-200 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-500">Delete</button>
                    </form>
                </td>
            </tr>
                    {{-- @dd($task->id) --}}
        @endforeach

        </tbody>
    </table>
</div>

@endsection
