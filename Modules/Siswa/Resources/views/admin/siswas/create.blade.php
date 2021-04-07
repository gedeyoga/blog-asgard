@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('siswa::siswas.title.create siswa') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.siswa.siswa.index') }}">{{ trans('siswa::siswas.title.siswas') }}</a></li>
        <li class="active">{{ trans('siswa::siswas.title.create siswa') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.siswa.siswa.store'], 'method' => 'post' , 'enctype' => 'multipart/form-data']) !!}
    
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group m-3">
                                <label for="">{{ trans('siswa::siswas.fields.nama') }}</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama...">
                                {{ $errors->first('nama') }}
                            </div>
                            <div class="form-group m-3">
                                <label for="">{{ trans('siswa::siswas.fields.umur') }}</label>
                                <input type="text" class="form-control" name="umur" placeholder="Masukkan umur...">
                                {{ $errors->first('umur') }}
                            </div>
                            <div class="form-group m-3">
                                <label for="">{{ trans('siswa::siswas.jurusan.title.jurusans') }}</label>
                                <select name="jurusan_id" class="form-control">
                                    <option value="">-- PILIH JURUSAN --</option>
                                    @foreach($jurusan as $jrs)
                                        <option value="{{ $jrs->id }}">{{ $jrs->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                {{ $errors->first('umur') }}
                            </div>
                            <div class="form-group m-3">
                                <label for="">{{ trans('siswa::siswas.fields.gambar') }}</label>
                                <input type="file" class="form-control" name="gambar">
                                {{ $errors->first('gambar') }}
                            </div>
                            <div class="form-group m-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                                <div style="width: 100%; height: 200px; margin-top: 30px;" id="map"></div>
                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lng" id="lng">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.siswa.siswa.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                    
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.siswa.siswa.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJRyIHISCimoNj8hkhQiSpqnuKS5nju8w&libraries=places&v=weekly"
    ></script>
    <script>
        let map;
        let marker;
        let latLng = new google.maps.LatLng(-34.397 , 150.644);
        let getLatId = document.getElementById('lat');
        let getLngId = document.getElementById('lng');
        let getAlamat = document.getElementById('alamat');

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: latLng,
                zoom: 8
            });
            marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: true,
                title: "Drag Me !"
            }); 
        }

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var input = document.getElementById("alamat"); //mengambil input
            var autocomplete = new google.maps.places.Autocomplete(input); //masukan input kedalam api (libraries places)
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                map.setCenter(place.geometry.location);
                map.setZoom(18);
                marker.setPosition(map.getCenter());

                getLatId.value = map.getCenter().lat();
                getLngId.value = map.getCenter().lng();
            });
            marker.addListener('dragend' , function(){
                map.setCenter(marker.position);
                map.setZoom(18);

                //Mengambil nama alamat ketika marker di dragend
                var latlng = new google.maps.LatLng(map.getCenter().lat(), map.getCenter().lng());
                var geocoder = geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': latlng }, (results, status) => {
                    if (status == google.maps.GeocoderStatus.OK) {                   
                        if (results[0]) {         
                            alamat.value = results[0].formatted_address;  
                        }
                    }
                });
                
                getLatId.value = map.getCenter().lat();
                getLngId.value = map.getCenter().lng();
            });
        }

        
        if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition((position) => {
                let lat = position.coords.latitude;
                let lng = position.coords.longitude;   
                latLng = new google.maps.LatLng(lat , lng);
                initMap();
                initialize();
              },function(error) {
                if (error.code == error.PERMISSION_DENIED){
                    latLng = latLng;
                    initMap();
                    initialize();
                }
              });
        }else{
            initMap();
            initialize();
        }
    </script>
@endpush
