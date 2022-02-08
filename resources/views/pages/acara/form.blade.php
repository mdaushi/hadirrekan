<form class="form" action="{{ route('acara.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="name">Nama Acara</label>
                <input type="text" id="name" class="form-control" placeholder="Lakut" name="name" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" class="form-control" placeholder="deskripsi" name="description"
                    autocomplete="off">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="text" id="tanggal" class="form-control" name="tanggal" autocomplete="off" required>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" id="tempat" class="form-control" name="tempat" placeholder="Tempat"
                    autocomplete="off" required>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
        </div>
    </div>
</form>
