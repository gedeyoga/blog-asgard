<div class="box-body">
    <div class="form-group mb-3">
        <label for="">{{ trans('siswa::siswas.fields.nama') }}</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama..." value="{{ $siswa->nama }}">
        {{ $errors->first('nama') }}
    </div>
    <div class="form-group mb-3">
        <label for="">{{ trans('siswa::siswas.fields.umur') }}</label>
        <input type="text" class="form-control" name="umur" placeholder="Masukkan umur..." value="{{ $siswa->umur }}">
        {{ $errors->first('umur') }}
    </div>
    <div class="form-group m-3">
        <label for="">{{ trans('siswa::siswas.jurusan.title.jurusans') }}</label>
        <select name="jurusan_id" class="form-control">
            <option value="">-- PILIH JURUSAN --</option>
            @foreach($jurusan as $jrs)
                <option value="{{ $jrs->id }}"
                    {{ ($jrs->id == $siswa->jurusan_id) ? 'selected' : '' }}
                >{{ $jrs->nama_jurusan }}</option>
            @endforeach
        </select>
        {{ $errors->first('umur') }}
    </div>
    <div class="form-group mb-3">
        <label for="">{{ trans('siswa::siswas.fields.gambar') }}</label>
        <input type="file" class="form-control" name="gambar">
        {{ $errors->first('gambar') }}
        <span>{{ $siswa->gambar }}</span>
    </div>
    <div class="form-group m-3">
        <label for="">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}">
        <div style="width: 100%; height: 200px; margin-top: 30px;" id="map"></div>
        <input type="hidden" name="lat" id="lat" value="{{ $siswa->lat }}">
        <input type="hidden" name="lng" id="lng" value="{{ $siswa->lng }}">
    </div>
</div>
