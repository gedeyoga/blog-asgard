<div class="box-body">
    <div class="form-row mb-3">
        <label for="">{{ trans('siswa::siswas.jurusan.fields.nama jurusan') }}</label>
        <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan Nama..." value="{{ $jurusans->nama_jurusan }}">
        {{ $errors->first('nama_jurusan') }}
    </div>
</div>
