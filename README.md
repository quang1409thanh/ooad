# Online Auction Project

## Description
This project is an online auction system written in PHP Laravel. Currently, it has only been migrated from plain PHP and hasn't utilized many of Laravel's features yet. These will be handled later.

## Steps to Run
1. Clone the repository and configure the `.env` file.
2. Install the packages using `composer install`.
3. It is currently not necessary to use the packages in `package.json`.
4. Migrate the database (Note: Disable the line `$this->handleWinningBids();` in `AppServiceProvider.php`).
5. Run the command `php artisan migrate`.
6. Run the command `php artisan db:seed`.
7. You can import the file `database/file/xxx.sql` to test the application.

## Author
This project was developed by Thanh. You can reach out to me at `thanhaxt342@gmail.com` for any queries or contributions.

