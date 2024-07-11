<x-app-layout>
    <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
        <h3>Add a Post</h3>
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="form-group">
            <label for="title">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
            <label for="date">date</label>
            <input type="date" id="date" name="date"/>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
        </div>
    </div>
    </div>
</x-app-layout>