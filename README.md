## Cài đặt

## Bước 1: + git clone https://github.com/Ngviet00/rbonline.git
          + cd rbonline

## Bước 2: + composer install
          + npm install

## Bước 3: Tạo database và config database
          + Vào trong localhost/phpmyadmin, tạo 1 csdl tên là "truyen", sau đó import file "book.sql" ở trong thư mục rbonline
          + Thực hiện lệnh để copy ra file .env: cp .env.example .env  
          + Chỉnh sửa file env:
                DB_CONNECTION=mysql          
                DB_HOST=127.0.0.1            
                DB_PORT=3306      (port theo máy của bạn)           
                DB_DATABASE=truyen     
                DB_USERNAME=root             
                DB_PASSWORD= 

## BƯớc 4: Tạo key cho project
    + php artisan key:generate

## Bước 5: Chạy project
    + php artisan serve
