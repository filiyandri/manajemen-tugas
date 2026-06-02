<h1>Edit Tugas</h1>

<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $task->title }}">
    <br><br>

    <input type="text" name="course" value="{{ $task->course }}">
    <br><br>

    <input type="date" name="deadline" value="{{ $task->deadline }}">
    <br><br>

    <textarea name="description">{{ $task->description }}</textarea>
    <br><br>

    <select name="status">
        <option value="pending">Pending</option>
        <option value="selesai">Selesai</option>
    </select>

    <br><br>

    <button type="submit">Update</button>
</form>