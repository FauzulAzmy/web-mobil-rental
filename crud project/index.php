<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "crud_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menentukan jumlah data per halaman
$per_page = 10;

// Menghitung total jumlah pengguna
$sql_total = "SELECT COUNT(*) AS total FROM pendaftar";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_users = $row_total['total'];

// Menentukan jumlah halaman
$total_pages = ceil($total_users / $per_page);

// Menentukan halaman saat ini, jika tidak ada maka halaman 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Menentukan posisi data yang akan ditampilkan berdasarkan halaman
$start = ($page - 1) * $per_page;

// Mendapatkan kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mendapatkan data pengguna dengan batasan
$sql = "SELECT * FROM pendaftar WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' LIMIT $start, $per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>CRUD System</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>

        <!-- Search and Add User Buttons -->
        <div class="top-buttons">
            <form action="index.php" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari pengguna..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="search-input">
                <button type="submit" class="btn-search">Cari</button>
            </form>
            <a href="create.php" class="btn btn-add">+ Tambah Pengguna Baru</a>
        </div>

        <div class="table-wrapper">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
							<th>Password</th> <!-- Kolom baru -->
                            <th>Telepon</th>
                            <th>Konfigurasi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["email"] . "</td>
									<td>" . $row["password"] . "</td> <!-- Tampilkan hash password -->
                                    <td>" . $row["phone"] . "</td>
                                    <td>
                                        <a href='update.php?id=" . $row["id"] . "' class='btn-edit'>Edit</a>
                                        <a href='delete.php?id=" . $row["id"] . "' class='btn-delete'>Hapus</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php
            if ($page > 1) {
                echo "<a href='index.php?page=" . ($page - 1) . "&search=$search' class='btn-prev'>Sebelumnya</a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='index.php?page=$i&search=$search' class='btn-page'>$i</a>";
            }

            if ($page < $total_pages) {
                echo "<a href='index.php?page=" . ($page + 1) . "&search=$search' class='btn-next'>Selanjutnya</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
