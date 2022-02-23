<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('acara.create') }}" class="btn rounded-pill btn-primary">Tambah Acara</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Acara</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->tempat}}</td>
                        <td class="d-flex">
                            <a style="margin-right: 6px" href="{{ route('acara.edit', $item->id) }}" class="btn btn-primary icon"><span class="bi bi-pencil-square"></span></a>
                            <form action="{{ route('acara.destroy', $item->id) }}" method="POST">
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