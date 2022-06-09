Dosyaların lokale aktarılmasının ardından 
## composer update
komutuyla vendor oluşturulur.

script ana dizini altında 
## .env
dosyası oluşturularak veritabanı ayarları yapılır.

## php artisan migrate
komutu ile tabloların oluşturulması sağlanır. alternatif olarak ana dizinde bulunan sql-kalıp.sql uzantılı dosya phpmyadmin ya da benzer bir araç üzerinden import edilebilir.

## php artisan serve
komutu terminalde çalıştırılarak projeye start verilir.
