@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card-dark p-4">

        <h2 class="mb-4 fw-bold">
            ➕ Tambah Tugas
        </h2>

        <form action="/tasks" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Judul Tugas
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    placeholder="Masukkan judul tugas"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Mata Kuliah
                </label>

                <input
                    type="text"
                    name="course"
                    class="form-control"
                    placeholder="Contoh: Pemrograman Web"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    class="form-control"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control"
                    placeholder="Masukkan deskripsi tugas"></textarea>

            </div>

            <button class="btn btn-primary">

                💾 Simpan Tugas

            </button>

            <a href="/tasks"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection