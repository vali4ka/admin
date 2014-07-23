SELECT products.name, images.id
FROM products
INNER JOIN relaciq_products_images ON products.id =relaciq_products_images.products_id;

SELECT products.name, images.name
FROM products
INNER JOIN relaciq_products_images ON products.id=relaciq_products_images.products_id
INNER JOIN images ON images.id = relaciq_products_images.images_id