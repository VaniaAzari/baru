@extends('layouts.layouts2')

@section('content')
	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/mahasiswa/{{ $action }}{{($action!='simpan')? '/'.$mahasiswa['id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}				
						 <h4 class="page-head-line">Form Edit Mahasiswa</h4>
					<div class="modal-body">
						@if($action=="delete")
							<div class="alert alert-danger">
	  							<strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
							</div>
						@endif
						<div class="form-group">
							<label class="col-sm-4 control-label">NIM</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="username" placeholder="NIM Mahasiswa" value="{{ ($action!='simpan') ? $mahasiswa['username'] : '' }}">
								<input type="hidden" class="form-control" name="id" value="{{ ($action!='simpan') ? $mahasiswa['id'] : '' }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Mahasiswa</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="{{ ($action!='simpan') ? $mahasiswa['nama'] : '' }}">
							</div>
						</div>						
						 <div class="form-group">
						 	<label class="col-sm-4 control-label">Jenis Kelamin</label>
							<div class="col-sm-8">
                 				<select name="jenis_kelamin" class="form-control" required>
                                    <option value=""  disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" <?php if($mahasiswa['jenis_kelamin'] == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                                    <option value="Perempuan" <?php if($mahasiswa['jenis_kelamin'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
                                </select>
             		  		</div>
          				</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Prodi</label>
							<div class="col-sm-8">
								<select name="prodi_id" class="form-control" >
										<option value="" disabled selected>Pilih Prodi</option>
									@foreach($prodi as $category)
   									 <option value="{{ $category->id }}"  @if($category->id==$mahasiswa->prodi_id) selected='selected' @endif >{{ $category->nama_prodi }}</option>
									@endforeach 
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Kelas</label>
							<div class="col-sm-8">
									<select name="kelas_id" class="form-control" >
										<option value="" disabled selected>Pilih Kelas</option>
									@foreach($kelas as $category)
   									 <option value="{{ $category->id }}"  @if($category->id==$mahasiswa->kelas_id) selected='selected' @endif >{{ $category->nama_kelas }}</option>
									@endforeach 
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Angkatan</label>
							<div class="col-sm-8">
									<select name="angkatan_id" class="form-control" >
										<option value="" disabled selected>Pilih Angkatan</option>
									@foreach($angkatan as $category)
   									 <option value="{{ $category->id }}"  @if($category->id==$mahasiswa->angkatan_id) selected='selected' @endif >{{ $category->nama_angkatan }}</option>
									@endforeach 
								</select>
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-4 control-label">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Password" value="{{ ($action!='simpan') ? $mahasiswa['password'] : '' }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file_name"  value="{{ ($action!='edit') ? $mahasiswa['file_name'] : '' }}"><?php echo $mahasiswa['file_name'];?>
                            </div>
                        </div>						
					</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >{{ ucwords($action) }}</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection