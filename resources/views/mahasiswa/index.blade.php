<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <h1>Aplikasi CRUD Sederhana</h1>

    <!-- Form untuk membuat entri baru -->
    <h2>Tambah Data</h2>
    <form method="post" action="{{ route('mahasiswa.store') }}">
        @csrf
        <!-- Form fields -->
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Tambah</button>
    </form>


    <!-- Tabel untuk menampilkan data -->
    <!-- Tabel untuk menampilkan data -->
    <h2>Data</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $no => $mahasiswa)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#editModal{{ $mahasiswa->id }}">Update</a>

                        <form method="post" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                            style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal untuk fitur edit -->
    @foreach ($mahasiswas as $mahasiswa)
        <div class="modal fade" id="editModal{{ $mahasiswa->id }}" tabindex="-1"
            aria-labelledby="editModal{{ $mahasiswa->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{ $mahasiswa->id }}Label">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Form fields for editing -->
                            <div class="form-group">
                                <label for="editNama{{ $mahasiswa->id }}">Nama</label>
                                <input type="text" name="nama" id="editNama{{ $mahasiswa->id }}"
                                    value="{{ $mahasiswa->nama }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="editEmail{{ $mahasiswa->id }}">Email</label>
                                <input type="email" name="email" id="editEmail{{ $mahasiswa->id }}"
                                    value="{{ $mahasiswa->email }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data mahasiswa berhasil ditambahkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Periksa apakah ada fragment hash pada URL
            if (window.location.hash && window.location.hash === '#successModal') {
                // Tampilkan modal jika fragment hash adalah '#successModal'
                $('#successModal').modal('show');
            }
        });
    </script>
