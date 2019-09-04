# Laravel Project Template

# TODOList
- 整理 FullBlog project
- 撰寫範例 Service / Repository / Route(web.php)
- 撰寫範例 Blade
- 傳送 Email 範例
- Middleware 範例

# TODO Blade 待寫路由的範例 
- 傳 & 接參數
- 使用 session
- 呼叫 路由 



# 已安裝
- BS4 CDN (待研究如何用 npm 處理)
- Laravel-ide-helper
- Laravel-srt

# Laravel-ide-helper
- [Laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- 提供 Laravel 檔案 Map， Go to definition 用
```
composer require --dev barryvdh/laravel-ide-helper


// 將此行加入 config/app.php 的 providers 陣列之內
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
```

# Laravel-srt
- [Laravel-srt](https://github.com/Maras0830/laravel-srt)
- 用來快速產生檔案用
```
composer require maras0830/laravel-srt

php artisan make:service UserService
php artisan make:repository UserRepository
php artisan make:transformer UserTransformer

// Make Service+Repository+Transformer
php artisan make:srt User
```
