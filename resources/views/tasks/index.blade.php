<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 flex justify-between bg-white border-b border-gray-200">
                    <span>Tasks</span> 
                    
                    <a href="{{ route('tasks.create')}}"> Create a new Task </a>
                </div>
                
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    <div> 
                        @if($tasks->isEmpty())
                            <p>Você não tem tarefas.</p>
                        @else
                            @foreach ($tasks as $task)
                                    <div class="col-sm">
                                        <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">{{  $task->name }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Date:{{ $task->date->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                            <div class="col-sm">
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                            <div class="col-sm">
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                             
                            @endforeach
                            
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
