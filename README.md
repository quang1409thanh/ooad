// các bước để chạy

- clone cấu hình file env
- cài đặt gói composer install
- migrate (lưu ý tắt dòng `$this->handleWinningBids();`  trong AppServiceProvider.php
- chạy lệnh `php artisan migrate`
- chạy lệnh `php artisan db:seed`

