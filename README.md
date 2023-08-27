# Laravel Livewire Komentar & Like
Simple Komentar dan Like
reference : [Ferry Dermawan](https://www.youtube.com/playlist?list=PL-X81XM3cE18MygVU6qXRxHxgNdfeJfPU)

## features
- buat komentar
- edit komentar
- like
- unlike
- balas komentar

## requirements
- php 8.1.2
- database mysql
- laravel 10.0
- laragon
- chrome
- composer

## installation

1. Clone repositori
    ```sh
    git clone https://github.com/fahmyfauzi/comments-app.git
    ```
2. masuk ke dalam directori
    ```sh
    cd comments-app
    ```
3. Instal composer
    ```sh
    composer install
    ```
4. setup .env database
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_didamelid
    DB_USERNAME=DB_USERNAME
    DB_PASSWORD=DB_PASSWORD
   ```
5. Copy .env.example
   ```
   cp .env.example .env
   ``` 
    
6. Generate an app encryption key

    ```sh
    php artisan key:generate
    ```
    
7. migrasi database
    ```
    php artisan migrate
    ```
    
8. Create data dummy
    ```
    php artisan tinker
    User::factory()->count(5)->create()   
    Article::factory()->count(10)->create()
    ```
    
9. jalankan project

    ```sh
   php artisan serve
    ```


## usage
- buka chrome masukan link ```comments-app.teset```
- akses ```http://comments-app.test/articles```
- login dan coba fitur-fiturnya

## credits

[Fahmy Fauzi ](https://github.com/fahmyfauzi)

## screanshot
1. home articles
![241453380-620ca194-3229-4f6f-8d1b-53011d46ccce](https://github.com/fahmyfauzi/comments-app/assets/58255031/8c8321c0-3c40-413c-8b5e-2997f15df70d)

2. detail article
![241453383-a2684a66-c5e8-4deb-b2a1-e170fc87143d](https://github.com/fahmyfauzi/comments-app/assets/58255031/7d76647f-e820-4f73-89db-8a0915afb4f1)

