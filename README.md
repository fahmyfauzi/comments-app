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
    
4. Generate an app encryption key

    ```sh
    php artisan key:generate
    ```
5. migrasi database
    ```
    php artisan migrate
    ```
6. Create data dummy
    ```
    php artisan tinker
    User::factory()->count(5)->create()   
    Article::factory()->count(10)->create()
    ```
    
7. jalankan project

    ```sh
   npm run dev
    ```


## usage
- buka chrome masukan link ```comments-app.teset```
- akses ```http://comments-app.test/articles```
- login dan coba fitur-fiturnya

## credits

[Fahmy Fauzi ](https://github.com/fahmyfauzi)

## screanshot
![article1](https://github.com/fahmyfauzi/comments-app/assets/58255031/620ca194-3229-4f6f-8d1b-53011d46ccce)
![article2](https://github.com/fahmyfauzi/comments-app/assets/58255031/a2684a66-c5e8-4deb-b2a1-e170fc87143d)
