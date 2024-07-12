<x-app-layout>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Update task</h3>
            <form action="{{ route('tasks.update', $task->id) }}" method="task">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" name="name"
                value="{{ $task->name }}" required>
            </div>
            <div class="form-group">
                <label for="date">date</label>
                <input class="form-control" id="date" name="date" type="date" value="{{ $task->date }}" required></input>
            </div>
            <button type="submit" class="btn mt-3 btn-primary">Update Task</button>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>