USE samet_smt1;
CREATE TABLE IF NOT EXISTS products (
	id INT AUTO_INCREMENT PRIMARY KEY,
    urun_ad VARCHAR(255) NOT NULL,
	urun_fiyat INT NOT NULL,
    stok_miktar INT NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

INSERT INTO categories (category_name) VALUES ('Kategori 1');
INSERT INTO categories (category_name) VALUES ('Kategori 2');
INSERT INTO categories (category_name) VALUES ('Kategori 3');