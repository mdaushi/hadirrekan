<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="name">Nama</label>
        <input value="{{ $sesi->nama ?? '' }}" type="text" id="name" class="form-control" placeholder="Nama"
            name="nama" autocomplete="off" required>
    </div>
</div>

<div class="col-md-6 col-12">
    <fieldset class="form-group">
        <label for="acara_id">Acara</label>
        <select class="form-select" id="acara_id" name="acara_id">
            @foreach ($acaras as $item)
                <option value="{{ $item->id }}" {{($item->id == ($sesi->acara_id ?? '')) ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
    </fieldset>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="tanggal">Waktu</label>
        <input value="{{ $sesi->waktu ?? '' }}" type="text" id="waktu" class="form-control" name="waktu" autocomplete="off" required>
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="deskripsi">Keterangan</label>
        <input value="{{$sesi->keterangan ?? ''}}" type="text" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan"
            autocomplete="off">
    </div>
</div>