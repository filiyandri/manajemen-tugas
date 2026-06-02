<h1>Tambah Tugas</h1>

<form action="/tasks" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Judul Tugas">
    <br><br>

    <input type="text" name="course" placeholder="Mata Kuliah">
    <br><br>

    <input type="date" name="deadline">
    <br><br>

    <textarea name="description" placeholder="Deskripsi"></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>