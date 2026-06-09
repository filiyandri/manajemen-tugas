@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card-dark p-4">

        <h2 class="mb-4 fw-bold">
            ✏️ Edit Tugas
        </h2>

        <form action="/tasks/{{ $task->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Judul Tugas
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ $task->title }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Mata Kuliah
                </label>

                <input
                    type="text"
                    name="course"
                    value="{{ $task->course }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deadline
                </label>

                <input
                    type="date"
                    name="deadline"
                    value="{{ $task->deadline }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-control">

                    <option value="pending"
                        {{ $task->status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="selesai"
                        {{ $task->status == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control">{{ $task->description }}</textarea>

            </div>

            <button class="btn btn-warning">

                💾 Update Tugas

            </button>

            <a href="/tasks"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection