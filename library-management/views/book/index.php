<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
</head>
<body>
    <h1>Koleksi Buku</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['author']; ?></td>
                    <td><?= $row['year']; ?></td>
                    <td><a href="index.php?delete=<?= $row['id']; ?>">Hapus</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Tambah Buku</h2>
    <form action="index.php" method="POST">
        <input type="text" name="title" placeholder="Judul" required>
        <input type="text" name="author" placeholder="Pengarang" required>
        <input type="number" name="year" placeholder="Tahun" required>
        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
