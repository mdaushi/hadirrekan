<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="name">Nama</label>
        <input value="{{ $peserta->name ?? '' }}" type="text" id="name" class="form-control" placeholder="Nama"
            name="name" autocomplete="off" required>
    </div>
</div>

<div class="col-md-6 col-12">
    <div class="form-group">
        <label for="asal">Asal</label>
        <small class="text-muted">sekolah/Cabang/Wilayah</small>
        <input value="{{ $peserta->asal ?? '' }}" type="text" id="asal" class="form-control" name="asal"
            autocomplete="off" required>
    </div>
</div>

<div class="col-md-6 col-12">
    <fieldset class="form-group">
        <label for="acara_id">Acara</label>
        <select class="form-select" id="acara_id" name="acara_id">
            @foreach ($acaras as $item)
                <option value="{{ $item->id }}" {{($item->id == ($peserta->acara_id ?? '')) ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
    </fieldset>
</div>
