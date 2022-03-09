<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sesi</h3>
                <p class="text-subtitle text-muted">Manajemen Sesi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Sesi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    {{-- section --}}
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible show fade">
        {{$message}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('sesi.create') }}" class="btn rounded-pill btn-primary">Tambah Sesi</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sesi</th>
                            <th>Acara</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sesis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->acara->name }}</td>
                                <td>{{ $item->waktu }}</td>
                                <td>{{ $item->keterangan ?: '-' }}</td>
                                <td class="d-flex">
                                    <a style="margin-right: 6px" href="{{ route('sesi.edit', $item->id) }}" class="btn btn-primary icon"><span class="bi bi-pencil-square"></span></a>
                                    <form action="{{ route('sesi.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger icon"><span class="bi bi-trash-fill"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>