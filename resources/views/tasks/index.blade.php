@extends('layouts.app')

@section('content')

<h1 class="fw-bold mb-2">
    Halo, {{ auth()->user()->name }} 👋
</h1>

<p class="text-secondary mb-5">
    Kelola tugas kuliahmu dengan lebih terorganisir.
</p>
<div class="card-dark p-4 mb-4">

    <div class="d-flex justify-content-between">

        <h5 class="mb-3">
            📊 Progress Tugas
        </h5>

        <strong>
            {{ $progress }}%
        </strong>

    </div>

    <div class="progress"
         style="height:12px;">

        <div class="progress-bar bg-success"
             role="progressbar"
             style="width: {{ $progress }}%;">

        </div>

    </div>

    <small class="text-secondary mt-2 d-block">

        {{ $completedTasks }}
        dari
        {{ $totalTasks }}
        tugas selesai

    </small>

</div>
<div class="row mb-4">
<div class="col-md-4">

    <div class="card-dark filter-card" data-filter="all">

        <h5>Total Tugas</h5>

        <h1>{{ $tasks->count() }}</h1>

    </div>

</div>

<div class="col-md-4">

    <div class="card-dark filter-card" data-filter="pending">

        <h5>Pending</h5>

        <h1>{{ $tasks->where('status', 'pending')->count() }}</h1>

    </div>

</div>

<div class="col-md-4">

    <div class="card-dark filter-card" data-filter="selesai">

        <h5>Selesai</h5>

        <h1>{{ $tasks->where('status', 'selesai')->count() }}</h1>

    </div>

</div>
</div>
<div class="card-dark">

    <div class="d-flex justify-content-between mb-4">

        <h3>Daftar Tugas</h3>

        <a href="/tasks/create"
           class="btn btn-primary">

            + Tambah Tugas

        </a>

    </div>
    <form method="GET" action="/tasks" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari tugas atau mata kuliah..."
            value="{{ request('search') }}"
        >

        <button type="submit"
                class="btn btn-primary">

            Cari

        </button>

    </div>

</form>

    <table class="table table-dark table-borderless align-middle">

        <thead>

            <tr>

                <th>Judul</th>
                <th>Mata Kuliah</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

           @forelse($tasks as $task)

    <tr class="task-row"
        data-status="{{ $task->status }}">

        <td>
            {{ $task->title }}
        </td>

                    <td>
                        {{ $task->course }}
                    </td>

                    <td>

@php

    $deadline = \Carbon\Carbon::parse($task->deadline);

    $today = \Carbon\Carbon::today();

    $daysLeft = $today->diffInDays($deadline, false);

@endphp

@if($daysLeft < 0)

    <span class="text-danger fw-bold">
        🔴 Terlambat
    </span>

    <br>

    <small>
        {{ $task->deadline }}
    </small>

@elseif($daysLeft <= 3)

    <span class="text-warning fw-bold">
        🟠 {{ $daysLeft }} hari lagi
    </span>

    <br>

    <small>
        {{ $task->deadline }}
    </small>

@else

    {{ $task->deadline }}

@endif

</td>

                    <td>

                        @if($task->status == 'pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @else

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @endif

                    </td>

                    <td class="d-flex gap-2">

                        <a href="/tasks/{{ $task->id }}/edit"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/tasks/{{ $task->id }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center text-secondary">

                        Belum ada tugas

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const cards = document.querySelectorAll('.filter-card');
    const rows = document.querySelectorAll('.task-row');

    cards.forEach(card => {

        card.addEventListener('click', function () {
        cards.forEach(c => c.classList.remove('active'));

this.classList.add('active');

            const filter = this.dataset.filter;

            rows.forEach(row => {

                if(filter === 'all') {

                    row.style.display = '';

                } else {

                    row.style.display =
                        row.dataset.status === filter
                        ? ''
                        : 'none';

                }

            });

        });

    });

});

</script>

@endsection