@extends('layouts.layouts')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
             <div class="row">
                <div class="col-md-6">
            <br><br>
            <h1> Login</h1>
            <hr>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    <li><span>{{ $err }}</span></li>
                    @endforeach
                </div>
                @endif
            <form action="{{ url('/kirimdata') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="alamat">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"></input>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</button>
                   
                </div>
            </form>
        </div>
          <div class="col-md-6">
                    <div class="alert alert-info">
                        Politeknik Caltex Riau mempunyai 10 prodi yang terdiri dari Teknik Komputer, Teknik Informatika, Sistem Informasi,
                      Akuntansi, Teknik Mekatronika, Teknik Telekomunikasi, Teknik Elektronika, Teknik Elektronika Telekomunikasi, Teknik Mesin, Teknik Listrik.
                        <br />
                         <strong>Prinsip Politeknik Caltex Riau :</strong>
                        <ul>
                            <li>
                               Kampus ramah lingkungan,
                            <li>
                              Bebas asap rokok,
                            </li>
                            <li>
                               Tertib lalu lintas.
                            </li>
                        </ul>
                         <strong>Motto Politeknik Caltex Riau :</strong>
                         “Empowers You to Global Competition”.
                       
                    </div>
                     <div class="alert alert-info">
                         <strong> Hubungi Kami: </strong>
                        <ul>
                            <li>
                              POLITEKNIK CALTEX RIAU
                            </li>
                            <li>
                               Jl. Umban Sari (Patin) No 1 Rumbai, Pekanbaru-Riau 28265
                            </li>
                            <li>
                              Telp : (0761) - 53939
                            </li>
                            <li>
                                Fax : (0761) - 554224
                            </li>
                        </ul>
                       
                    </div>
    </div>

</div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
