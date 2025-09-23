
SELECT * FROM products WHERE listPrice < 400;

INSERT INTO products (categoryID, productCode, productName, listPrice)
VALUES (1, 'guitar100', 'Guitar Test', 350);

DELETE FROM products WHERE productCode = 'guitar100';

GRANT SELECT ON my_guitar_shop1.* TO 'msg_tester'@'localhost' IDENTIFIED BY 'password';
