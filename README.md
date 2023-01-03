## Running
1. composer install 
2. php artisan key:generate
3. npm install
4. php artisan migrate
5. php artisan db:seed
6. php artisan serve
7. npm run watch



#Untuk Mengosongkan Database
php artisan migrate:rollback 


#create db migration
php artisan make:migration tm_produk --create=tm_produk

#create controller
php artisan make:controller ProdukController -r

#create model
php artisan make:model ModelProduk


