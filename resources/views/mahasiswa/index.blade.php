<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 30px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        button[type="submit"] {
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>

<body>
    <h1>Aplikasi CRUD Sederhana</h1>

    <!-- Form untuk membuat entri baru -->
    <h2>Tambah Data</h2>
    <form method="post" action="create.php">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Tabel untuk menampilkan data -->
    <h2>Data</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa1 as $no => $mhs)
                <tr>
                    <th>{{ $no + 1 }}</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
