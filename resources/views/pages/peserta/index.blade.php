<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peserta</h3>
                <p class="text-subtitle text-muted">Manajemen Peserta.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Peserta</li>
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
                <a href="{{ route('peserta.create') }}" class="btn rounded-pill btn-primary">Tambah Peserta</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-responsive" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Asal</th>
                            <th>Acara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $item)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->asal }}</td>
                            <td>{{ $item->acara->name }}</td>
                            <td class="d-flex">
                                <a style="margin-right: 6px" href="{{ route('peserta.edit', $item->id) }}" class="btn btn-primary icon"><span class="bi bi-pencil-square"></span></a>
                                <form action="{{ route('peserta.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger icon"><span class="bi bi-trash-fill"></span></button>
                                </form>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>
