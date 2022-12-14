@extends('dashboard.user.main')
@section('title','Profile')

@section('content')

 <!-- Content Header (Page header) -->
 @if ($message = Session::get('status'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle user_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center user_name">{{Auth::user()->name}}</h3>

                  <input type="file" name="user_image" id="user_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Informasi Pribadi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Riwayat Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pekerjaan" data-toggle="tab">Pekerjaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#organisasi" data-toggle="tab">Organisasi</a></li>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('user.profileupdate') }}">
                        {{  csrf_field() }}

                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNamaL" class="col-sm-2 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNamaL" placeholder="Nama Lengkap" value="{{ Auth::user()->namalengkap }}" name="namalengkap">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputTempatL" class="col-sm-2 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTempatL" placeholder="Tempat Lahir" value="{{ Auth::user()->tempatlahir }}" name="tempatlahir">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputTanggalL" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="inputTanggalL" placeholder="Tanggal Lahir" value="{{ Auth::user()->tanggallahir }}" name="tanggallahir">
                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputJk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="form-check form-check-inline pl-2">
                              <input class="form-check-input" type="radio" name="jeniskelamin" value="Pria" checked="{{ Auth::user()->jeniskelamin == 'Pria' ? 'true':'false'}}">
                              <label class="form-check-label px-auto">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jeniskelamin" value="Wanita" checked="{{ Auth::user()->jeniskelamin == 'Wanita' ? 'true':'false'}}">
                              <label class="form-check-label px-auto">Wanita</label>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputGD" class="col-sm-2 col-form-label">Golongan Darah</label>
                          <div class="form-check form-check-inline pl-2">
                              <input class="form-check-input" type="radio" name="golongandarah" value="A" {{ old('jeniskelamin') == 'A' ? 'checked':''}}>
                              <label class="form-check-label px-auto">A</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="golongandarah" value="B" {{ old('jeniskelamin') == 'B' ? 'checked':''}}>
                              <label class="form-check-label px-auto">B</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="golongandarah" value="AB" {{ old('jeniskelamin') == 'AB' ? 'checked':''}}>
                              <label class="form-check-label px-auto">AB</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="golongandarah" value="O" {{ old('jeniskelamin') == 'O' ? 'checked':''}}>
                              <label class="form-check-label px-auto">O</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="golongandarah" value="Belum tahu" {{ old('jeniskelamin') ==  'Belum tahu' ? 'checked':''}}>
                              <label class="form-check-label px-auto">Belum tahu</label>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                          <div class="col-sm-10">
                          <select class="custom-select" name="agama" id="inputagama" placeholder="..."value="{{ Auth::user()->agama }}">
                            <option disabled value @if(Auth::user()->agama == 'null')selected @endif>-- Pilih --</option>
                            <option @if(Auth::user()->agama == 'Islam')selected @endif>Islam</option>
                            <option @if(Auth::user()->agama == 'Kristen')selected @endif>Kristen</option>
                            <option @if(Auth::user()->agama == 'Hindu')selected @endif>Hindu</option>
                            <option @if(Auth::user()->agama == 'Buddha')selected @endif>Buddha</option>
                            <option @if(Auth::user()->agama == 'Konghucu')selected @endif>Konghucu</option>
                            <option @if(Auth::user()->agama == 'Lainnya..')selected @endif>Lainnya..</option>
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAlamatK" class="col-sm-2 col-form-label">Alamat (KTP)</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="inputAlamatK" placeholder="Alamat (Sesuai KTP)"  name="alamatktp">{{ Auth::user()->alamatktp }}</textarea>
                            <span class="text-danger error-text alamatktp_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAlamatD" class="col-sm-2 col-form-label">Alamat (Domisili)</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="inputAlamatD" placeholder="Alamat (Sesuai Domisili)"  name="alamatdomisili">{{ Auth::user()->alamatdomisili }}</textarea>
                            <span class="text-danger error-text alamatdomisili_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputHobi" class="col-sm-2 col-form-label">Hobi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputHobi" placeholder="Hobi" value="{{ Auth::user()->hobi }}" name="hobi">
                            <span class="text-danger error-text hobi_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNo" class="col-sm-2 col-form-label">Nomor Telepon</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNo" placeholder="Nomor Telepon" value="{{ Auth::user()->nomortelfon }}" name="nomortelfon">
                            <span class="text-danger error-text nomortelfon_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="pendidikan">
                      <form class="form-horizontal" method="POST" action="user/education">
                        {{  csrf_field() }}

                        <h4>Form S1</h4>
                        <div class="form-group row">
                          <label for="inputJurusan" class="col-sm-2 col-form-label">Program studi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputJurusan" placeholder="*Contoh : S1-Ilmu Komputer" value="{{ $education->jurusan }}" name="jurusan">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAngkatan" class="col-sm-2 col-form-label">Angkatan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAngkatan" placeholder="*Contoh : 1999/2000" value="{{ $education->angkatan }}" name="angkatan">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputFakultas" class="col-sm-2 col-form-label">Fakultas</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFakultas" placeholder="*Contoh : FMIPA" value="{{ $education->fakultas }}" name="fakultas">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputKodeJurusan" class="col-sm-2 col-form-label">Kode Jurusan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputKodeJurusan" placeholder="*Contoh : G6" value="{{ $education->kode_jurusan }}" name="kode_jurusan">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNIM" class="col-sm-2 col-form-label">NIM</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNIM" placeholder="*Contoh : G641XXX" value="{{ $education->NIM}}" name="NIM">
                          </div>
                        </div>

                        <h4 class="border-top">Form S2</h4>
                        <div class="form-group row">
                          <label for="inputJurusan" class="col-sm-2 col-form-label">Program studi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputJurusan" placeholder="*Contoh : S2-Ilmu Komputer" value="{{ $education->jurusan2 }}" name="jurusan2">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAngkatan" class="col-sm-2 col-form-label">Angkatan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAngkatan" placeholder="Contoh : 2000/2001" value="{{ $education->angkatan2 }}" name="angkata2n">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputFakultas" class="col-sm-2 col-form-label">Fakultas</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFakultas" placeholder="*Contoh : FMIPA" value="{{ $education->fakultas2 }}" name="fakultas2">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputKodeJurusan" class="col-sm-2 col-form-label">Kode Jurusan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputKodeJurusan" placeholder="*Contoh : G6" value="{{ $education->kode_jurusan2 }}" name="kode_jurusan2">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNIM" class="col-sm-2 col-form-label">NIM</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNIM" placeholder="*Contoh : A24XXX" value="{{ $education->NIM2 }}" name="NIM2">
                          </div>
                        </div>

                        <h4 class="border-top">Form S3</h4>
                        <div class="form-group row">
                          <label for="inputJurusan" class="col-sm-2 col-form-label">Program studi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputJurusan" placeholder="*Contoh : S3-Ilmu Komputer" value="{{ $education->jurusan3 }}" name="jurusan3">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAngkatan" class="col-sm-2 col-form-label">Angkatan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAngkatan" placeholder="*Contoh : 2000/2001" value="{{ $education->angkatan3 }}" name="angkatan3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputFakultas" class="col-sm-2 col-form-label">Fakultas</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFakultas" placeholder="*Contoh : FMIPA" value="{{ $education->fakultas3 }}" name="fakultas3">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputKodeJurusan" class="col-sm-2 col-form-label">Kode Jurusan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputKodeJurusan" placeholder="*Contoh : A2" value="{{ $education->kode_jurusan3 }}" name="kode_jurusan3">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNIM" class="col-sm-2 col-form-label">NIM</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNIM" placeholder="*Contoh : B34XXXX" value="{{ $education->NIM3 }}" name="NIM3">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <div class="tab-pane" id="pekerjaan">
                      <form class="form-horizontal" method="POST" action="user/job">
                        {{  csrf_field() }}


                        <div class="form-group row">
                          <label for="inputPekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPekerjaan" placeholder="*Contoh : PNS" value="{{ $job->pekerjaan }}" name="pekerjaan">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputNama_p" class="col-sm-2 col-form-label mb-3">Nama Perusahaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Perusahaan" value="{{ $job->nama_p }}" name="nama_p">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputAlamat_p" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Alamat Perusahaan" value="{{ $job->alamat_p }}" name="alamat_p">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Jabatan" value="{{ $job->jabatan }}" name="jabatan">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputProduk" class="col-sm-2 col-form-label">Produk tempat kerja</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="*Contoh : Jasa, Barang" value="{{ $job->produk }}" name="produk">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    
                    <div class="tab-pane" id="organisasi">
                      <form class="form-horizontal" method="POST" action="user/organization">
                        {{  csrf_field() }}


                        <div class="form-group row">
                          <label for="inputOrganisasi" class="col-sm-2 col-form-label">Organisasi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Organisasi" value="{{ $org->organisasi }}" name="organisasi">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputJabatan" class="col-sm-2 col-form-label mb-3">Jabatan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Jabatan" value="{{ $org->jabatan }}" name="jabatan">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputTanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control"  placeholder="Tanggal Masuk" value="{{ $org->tanggal_masuk }}" name="tanggal_masuk">                            
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <!-- /.tab-pane -->
                    
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection