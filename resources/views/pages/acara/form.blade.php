<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="name">Nama Acara</label>
        <input value="{{$acara->name ?? ''}}" type="text" id="name" class="form-control" placeholder="Lakut" name="name" autocomplete="off" required>
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input value="{{$acara->description ?? ''}}" type="text" id="deskripsi" class="form-control" placeholder="deskripsi" name="description"
            autocomplete="off">
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input value="{{ $acata->tanggal ?? '' }}" type="text" id="tanggal" class="form-control" name="tanggal" autocomplete="off" required>
    </div>
</div>
<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="tempat">Tempat</label>
        <input value="{{$acara->tempat ?? ''}}" type="text" id="tempat" class="form-control" name="tempat" placeholder="Tempat"
            autocomplete="off" required>
    </div>
</div>