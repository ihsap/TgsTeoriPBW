<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
</head>
<body>
    <h1>Peminjaman Buku</h1>
    <form action="borrow.php" method="POST">
        <label for="book">Pilih Buku:</label>
        <select name="book_id" required>
            <?php foreach ($books as $book): ?>
                <option value="<?= $book['id']; ?>"><?= $book['title']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Pinjam Buku">
    </form>
</body>
</html>
