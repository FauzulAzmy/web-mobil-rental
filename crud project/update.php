<?php
// Membuat koneksi ke database
$conn = new mysqli("localhost", "root", "", "crud_db");

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menyusun query untuk mendapatkan data pengguna berdasarkan id
    $sql = "SELECT * FROM pendaftar WHERE id=$id";
    $result = $conn->query($sql);

    // Mengecek apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $hashedPassword = $row['password']; // Mengambil password terenkripsi dari database
    }
}

// Memeriksa apakah form telah dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validasi panjang password minimal 8 karakter
    if (strlen($password) < 8) {
        $error = "Password harus memiliki panjang minimal 8 karakter.";
    } else {
        // Mengecek apakah password diubah
        if (password_verify($password, $hashedPassword)) {
            // Password tetap sama, gunakan yang lama
            $newHashedPassword = $hashedPassword;
        } else {
            // Password diubah, hash password baru
            $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        // Menyusun query untuk memperbarui data pengguna
        $sql = "UPDATE pendaftar SET name='$name', email='$email', phone='$phone', password='$newHashedPassword' WHERE id=$id";

        // Mengeksekusi query dan mengecek apakah berhasil
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); // Redirect ke halaman utama jika berhasil
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error; // Menampilkan pesan kesalahan jika gagal
        }
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #5cb85c;
            outline: none;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ubah Data Diri Anda</h2>
        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($error)) { echo "<div class='error'>$error</div>"; } ?>

        <form method="POST" action="">
            <!-- Menyertakan ID pengguna sebagai input tersembunyi -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="name">Nama:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" required>

            <label for="phone">Telepon:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Masukkan password baru " required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
