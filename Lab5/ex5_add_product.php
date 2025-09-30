<?php
require 'ex4_db_connect.php'; // Sử dụng file kết nối DB đã có

// --- 1. Xử lý logic thêm sản phẩm ---
if (isset($_POST['btn_add_product'])) {
    // Lấy dữ liệu từ form và sanitize/validate
    $category_id = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    // Giả định validation đơn giản
    if ($category_id === false || $category_id === null || 
        empty($code) || empty($name) || $price === false || $price === null) 
    {
        $error = "Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại.";
    } else {
        // Chuẩn bị câu lệnh INSERT
        $sql = "INSERT INTO products 
                 (categoryID, productCode, productName, listPrice, dateAdded)
              VALUES 
                 (:category_id, :code, :name, :price, NOW())";
        
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':category_id', $category_id);
            $stmt->bindValue(':code', $code);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':price', $price);
            $stmt->execute();
            header("Location: ex4_index.php"); // Chuyển về danh sách sản phẩm
            exit();
        } catch (PDOException $e) {
            $error = "Lỗi khi thêm sản phẩm vào DB: " . $e->getMessage();
        }
    }
}

// --- 2. Lấy danh sách Categories cho dropdown ---
$query_categories = "SELECT categoryID, categoryName FROM categories ORDER BY categoryID";
$categories = $db->query($query_categories);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>EX5 - Thêm Sản phẩm</title></head>
<body>
<h2>EX5 - Thêm Sản phẩm</h2>

<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post">
    <label>Category:</label>
    <select name="categoryID">
        <?php foreach ($categories as $c): ?>
            <option value="<?php echo $c['categoryID']; ?>"
                <?php 
                if ($c['categoryName'] === 'Guitars') {
                    echo 'selected';
                }
                ?>
            >
                <?php echo $c['categoryName']; ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    
    <label>Code (test1):</label> 
    <input type="text" name="code" value="test1" required><br><br>
    
    <label>Name (Test Product 2211):</label> 
    <input type="text" name="name" value="Test Product 2211" required><br><br>
    
    <label>List Price (550.00):</label> 
    <input type="number" step="0.01" name="price" value="550.00" required><br><br>
    
    <input type="submit" name="btn_add_product" value="Thêm Sản phẩm">
</form>

<hr>
<a href="ex4_index.php">Quay về Product List</a> 
</body>
</html>