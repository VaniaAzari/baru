@extends('layouts.layouts2')

@section('content')
	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/dosen/{{ $action }}{{($action!='simpan')? '/'.$dosen['id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}					
						 <h4 class="page-head-line">Form Edit Dosen</h4>					
					<div class="modal-body">					
						<div class="form-group">
							<label class="col-sm-4 control-label">NIP</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="username" placeholder="NIP Dosen" value="{{ ($action!='simpan') ? $dosen['username'] : '' }}">
								<input type="hidden" class="form-control" name="id" value="{{ ($action!='simpan') ? $dosen['id'] : '' }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Dosen</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" placeholder="Nama Dosen" value="{{ ($action!='simpan') ? $dosen['nama'] : '' }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" <?php if($dosen['jenis_kelamin'] == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                                        <option value="Perempuan" <?php if($dosen['jenis_kelamin'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-4 control-label">Email</label>
							<div class="col-sm-8">
									<input type="text" class="form-control" name="email" placeholder="Email" value="{{ ($action!='simpan') ? $dosen['email'] : '' }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
									<input type="password" class="form-control" name="password" placeholder="Password" value="{{ ($action!='simpan') ? $dosen['password'] : '' }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file_name"  value="{{ ($action!='edit') ? $dosen['file_name'] : '' }}"><?php echo $dosen['file_name'];?>
                            </div>
                        </div>
					</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn btn-success pull-right" >{{ ucwords($action) }}</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection
                                                    