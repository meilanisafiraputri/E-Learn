 @extends('layouts.layoutGuru')
 @section('content')
     <style>
         .main-content {
             position: absolute;
             top: 42px;
             left: 268px;
             width: 84vw;
         }

         .icon-plus-container {
             position: fixed;
             bottom: 20px;
             right: 20px;
         }

         .icon-plus {
             display: flex;
             align-items: center;
             justify-content: center;
             background-color: #007bff;
             color: #fff;
             border-radius: 50%;
             width: 50px;
             height: 50px;
             text-decoration: none;
             font-size: 50px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             transition: background-color 0.3s ease;
         }

         .icon-plus:hover {
             background-color: #0056b3;
         }

         /* Tombol besar dengan ikon plus */
         .large-button {
             position: fixed;
             bottom: 20px;
             right: 10px;
             width: 70px;
             height: 70px;
             background-color: #4FA987;
             color: #fff;
             font-size: 45px;
             border: none;
             border-radius: 100px;
             cursor: pointer;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             transition: background-color 0.3s ease;
             padding: 10px;
         }

         .large-button:hover {
             background-color: darkgreen;
         }

          /* Gaya baru untuk tombol hapus */
        .delete-button {
            position: absolute;
            bottom: 0;
            right: 0;
            margin: 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 30px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 30px
        }

        .delete-button:hover {
            background-color: #c82333;
        }
     </style>
     <div class="container-fluid">
         <div class="row">
             <section class="courses section">
                 <div class="container">
                     <div class="row">
                         @foreach ($materi as $mtr)
                             <div class="col-lg-4 col-md-4 col-4">
                                 <!-- Single Course -->
                                 <div class="single-course">
                                     <!-- Course Head -->
                                     <div class="course-head overlay">
                                         <img src="{{ asset('storage/default/' . $mtr->cover) }}" alt="#">
                                         {{-- <div class="overlay-content">
                            <a href="course-single.html" class="btn white primary">Register Now</a>
                        </div> --}}
                                     </div>
                                     <!-- Course Body -->
                                     <div class="course-body">
                                         <div class="name-price">
                                             <div class="teacher-info">
                                                 <img src="assets/images/author1.jpg" alt="#" class="rounded-circle"
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                                 <h4 class="title">Jewel Mathies</h4>
                                             </div>
                                             <span class="price" type="button" class="btn btn-primary" data-toggle="modal"
                                                 data-target="#exampleModal">Rp. {{ $mtr->harga }}</span>
                                         </div>
                                         <h4 class="c-title"><a href="course-single.html">{{ $mtr->nama_materi }}</a>
                                         </h4>
                                         <p>{{ $mtr->deskripsi }}</p>
                                     </div>
                                     {{-- <button type="button" class="edit-button" data-bs-toggle="modal"
                                     data-bs-target="#EditModal">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button> --}}
                                     <form id="delete-form-{{ $mtr->id }}" action="{{route('materi.destroy', $mtr->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                     <button type="button" class="delete-button" onclick="confirmDelete('{{ $mtr->id }}')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    </form>
                                 </div>
                                 <!--/ End Single Course -->
                             </div>
                             {{-- <div class="col-lg-4 col-md-4 col-4"> --}}
                             <!-- Single Course -->
                             {{-- <div class="single-course"> --}}
                             <!-- Course Head -->
                             {{-- <div class="course-head overlay">
                                     <img src="assets/images/courses/course3.jpg" alt="#"> --}}
                             {{-- <a href="course-single.html" class="btn white primary">Register Now</a> --}}
                             {{-- </div> --}}
                             <!-- Course Body -->
                             {{-- <div class="course-body">
                                     <div class="name-price">
                                         <div class="teacher-info">
                                             <img src="assets/images/author3.jpg" alt="#">
                                             <h4 class="title">Noha Brown</h4>
                                         </div>
                                         <span class="price">Free</span>
                                     </div>
                                     <h4 class="c-title"><a href="course-single.html">Free PHP Web Development</a></h4>
                                     <p>Natus voluptatibus perferendis repellendus Amet rerum quis odioThe ship set ground
                                         on the
                                         shore of this uncharted Gilligan</p>
                                 </div>
                             </div> --}}
                             <!--/ End Single Course -->
                             {{-- </div>
                         <div class="col-lg-4 col-md-4 col-4"> --}}
                             <!-- Single Course -->
                             {{-- <div class="single-course"> --}}
                             <!-- Course Head -->
                             {{-- <div class="course-head overlay">
                                     <img src="assets/images/courses/course2.jpg" alt="#"> --}}
                             {{-- <a href="course-single.html" class="btn white primary">Register Now</a> --}}
                             {{-- </div> --}}
                             <!-- Course Body -->
                             {{-- <div class="course-body">
                                     <div class="name-price">
                                         <div class="teacher-info">
                                             <img src="assets/images/author2.jpg" alt="#">
                                             <h4 class="title">Jenola Protan</h4>
                                         </div>
                                         <span class="price" type="button" class="btn btn-primary" data-toggle="modal"
                                             data-target="#exampleModal">$290</span>
                                     </div>
                                     <h4 class="c-title"><a href="course-single.html">Learn Web Developments Course</a></h4>
                                     <p>Natus voluptatibus perferendis repellendus Amet rerum quis odioThe ship set ground
                                         on the
                                         shore of this uncharted Gilligan</p>
                                 </div>
                             </div> --}}
                             <!--/ End Single Course -->
                             {{-- </div> --}}
                             <!--/ End Single Course -->
                               <!-- Modal Edit -->
                                <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('materi.update', $mtr)}}" method="post" enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Edit Materi dan Tugas</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="modal-title" id="exampleModalLabel">Tambah Materi</h6>
                                                    <label for="inputText" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <select class="form-select form-select-sm mb-2" name="mapel"
                                                                aria-label="Large select example" id="update_mapel" width="200px" value="{{ old('mapel') }}">
                                                                <option selected>{{$mtr->mapel}}</option>
                                                                <option value="Matematika">Matematika</option>
                                                                <option value="IPA">IPA</option>
                                                                <option value="IPS">IPS</option>
                                                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Nama Materi</label>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="nama_materi" class="form-control" id="update_nama_materi"
                                                                width="200px" value="{{ old('nama_materi', $mtr->nama_materi) }}">
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-12 col-form-label">File Materi</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input type="file" name="file_materi" class="form-control" id="update_file_materi"
                                                                width="200px" value="{{ old('file_materi', $mtr->file_materi) }}">
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <select class="form-select form-select-sm mb-1" name="kelas"
                                                                aria-label="Large select example" id="update_kelas" width="200px" value="{{ old('kelas', $mtr->kelas) }}">
                                                                <option selected>{{$mtr->kelas}}</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Harga</label>
                                                    <div class="row">
                                                        <div class="col-sm-12" width="200px">
                                                            <input type="number" name="harga" class="form-control" id="update_harga"
                                                                width="200px" value="{{ old('harga', $mtr->harga) }}">
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Deskripsi</label>
                                                    <div class="row">
                                                        <div class="col-sm-12" width="200px" value="{{ old('deskripsi', $mtr->deskripsi) }}">
                                                            <textarea type="text" name="deskripsi" class="form-control" id="update_deskripsi" width="200px" value="{{ old('deskripsi', $mtr->deskripsi) }}">{{$mtr->deskripsi}}</textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h6 class="modal-title" id="exampleModalLabel">Tambah Tugas</h6>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Nama Tugas</label>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="tugas" class="form-control" id="update_tugas"
                                                                width="200px" value="{{ old('tugas', $mtr->tugas) }}">
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Detail Tugas</label>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-12">
                                                            <textarea type="text" name="detail_tugas" class="form-control" id="update_detail_tugas" width="200px" value="{{ old('detail_tugas', $mtr->detail_tugas) }}">{{$mtr->detail_tugas}}</textarea>
                                                        </div>
                                                    </div>
                                                    <label for="inputText" class="col-sm-6 col-form-label">Tanggal Tugas</label>
                                                    <div class="row mb-1">
                                                        <div class="col-sm-12">
                                                            <input type="date" name="tanggal_tugas" class="form-control" id="update_tanggal_tugas"
                                                                width="200px" value="{{ old('tanggal_tugas', $mtr->tanggal_tugas) }}">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                         @endforeach
                     </div>
                     <button type="button" class="large-button" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal">
                                 <i class="fas fa-plus"></i>
                             </button>
                 </div>
         </div>
         </section>
     </div>
     </div>

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h3 class="modal-title" id="exampleModalLabel">Tambah Materi dan Tugas</h3>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <h6 class="modal-title" id="exampleModalLabel">Tambah Materi</h6>
                     <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <label for="inputText" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                         <div class="row">
                             <div class="col-sm-12">
                                 <select class="form-select form-select-sm mb-2" name="mapel"
                                     aria-label="Large select example" id="mapel" width="200px">
                                     <option selected>Pilih Mata Pelajaran</option>
                                     <option value="Matematika">Matematika</option>
                                     <option value="IPA">IPA</option>
                                     <option value="IPS">IPS</option>
                                     <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                     <option value="Bahasa Inggris">Bahasa Inggris</option>
                                 </select>
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-6 col-form-label">Nama Materi</label>
                         <div class="row mb-2">
                             <div class="col-sm-12">
                                 <input type="text" name="nama_materi" class="form-control" id="nama_materi"
                                     width="200px">
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-12 col-form-label">File Materi</label>
                         <div class="row">
                             <div class="col-sm-12">
                                 <input type="file" name="file_materi" class="form-control" id="file_materi"
                                     width="200px">
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                         <div class="row">
                             <div class="col-sm-12">
                                 <select class="form-select form-select-sm mb-1" name="kelas"
                                     aria-label="Large select example" id="kelas" width="200px">
                                     <option selected>Pilih Kelas</option>
                                     <option value="10">10</option>
                                     <option value="11">11</option>
                                     <option value="12">12</option>
                                 </select>
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-6 col-form-label">Harga</label>
                         <div class="row">
                             <div class="col-sm-12" width="200px">
                                 <input type="number" name="harga" class="form-control" id="harga"
                                     width="200px">
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-6 col-form-label">Deskripsi</label>
                         <div class="row">
                             <div class="col-sm-12" width="200px">
                                 <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" width="200px"></textarea>
                             </div>
                         </div>
                         <br>
                         <h6 class="modal-title" id="exampleModalLabel">Tambah Tugas</h6>
                         <label for="inputText" class="col-sm-6 col-form-label">Nama Tugas</label>
                         <div class="row mb-1">
                             <div class="col-sm-12">
                                 <input type="text" name="tugas" class="form-control" id="tugas"
                                     width="200px">
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-6 col-form-label">Detail Tugas</label>
                         <div class="row mb-1">
                             <div class="col-sm-12">
                                 <textarea type="text" name="detail_tugas" class="form-control" id="detail_tugas" width="200px"></textarea>
                             </div>
                         </div>
                         <label for="inputText" class="col-sm-6 col-form-label">Tanggal Tugas</label>
                         <div class="row mb-1">
                             <div class="col-sm-12">
                                 <input type="date" name="tanggal_tugas" class="form-control" id="tanggal_tugas"
                                     width="200p'/x">
                             </div>
                         </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>


     <!-- Include SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script untuk menampilkan SweetAlert -->
<script>
    function confirmDelete(materiId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form when confirmed
                document.getElementById('delete-form-' + materiId).submit();
            }
        });
    }
</script>
 @endsection
