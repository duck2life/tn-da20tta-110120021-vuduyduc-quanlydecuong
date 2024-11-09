# Đề tài: Xây dựng website quản lý quá trình cập nhật đề cương chi tiết học phần  

## Sinh viên thực hiện:  
- **Họ tên:** Vủ Duy Đức  
- **MSSV:** 110120021  
- **Lớp:** DA20TTA  
- **Email:** blacklmht@gmail.com  

## Chức năng hệ thống:  
1. Tạo và quản lý đề cương chi tiết học phần
2. Xem các đề phiên bản cũ của các đề cương đã tạo

## Cài đặt:  
1. Cài đặt PHP.  
2. Cài đặt Xampp.  
3. Cài đặt Composer.  
4. Tải dự án về máy.  
5. Sao chép tệp `.env.example` thành `.env`.  
6. Thay đổi cài đặt trong tệp `.env`:  
   - `DB_CONNECTION`  
   - `DB_DATABASE`  
   - `DB_USERNAME`  
   - `DB_PASSWORD`  

## Chạy lệnh:  
- Chạy lệnh `composer install`.  
- Chạy lệnh `php artisan migrate`.  
- Nếu có lỗi, xem database có trùng kiểu dữ liệu với file `test.sql` hay không. Chỉnh sửa lại database để trùng dữ liệu với file `test.sql`.
