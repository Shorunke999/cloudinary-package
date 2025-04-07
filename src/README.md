# Laravel Cloudinary Integration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shorunke/cloudinary.svg?style=flat-square)](https://packagist.org/packages/shorunke/cloudinary)
[![Total Downloads](https://img.shields.io/packagist/dt/shorunke/cloudinary.svg?style=flat-square)](https://packagist.org/packages/shorunke/cloudinary)

Easily integrate [Cloudinary](https://cloudinary.com) into your Laravel application. This package provides a simple and expressive way to upload, rename, delete, and manage media files on Cloudinary, with full support for Laravel 12.

---

## ✨ Features

- Upload images or files to Cloudinary
- Delete files by public ID
- Move/Rename files
- Extract Cloudinary public ID from URL
- Simple configuration and service binding
- Optional facade for global access

---

## 🚀 Installation

Install the package via Composer:

```bash
composer require shorunke/cloudinary
```

Then, publish the config and service class:
```bash
php artisan cloudinary:install
```

## 🔧 Configuration
After installation, a config/cloudinary.php file will be published. Add your environment variables to your .env file:

```bash
    CLOUDINARY_CLOUD_NAME=your-cloud-name
    CLOUDINARY_API_KEY=your-api-key
    CLOUDINARY_API_SECRET=your-api-secret
    CLOUDINARY_SECURE_URL=true
```

## 🛠️ Usage
Using Dependency Injection

```php

    use Shorunke\Cloudinary\CloudinaryService;

    public function store(Request $request, CloudinaryService $cloudinary)
    {
        $result = $cloudinary->upload($request->file('image')->getPathname(), 'uploads');
        return response()->json($result);

        //to get the secure url 
        $secure = $result['secure_url'];
    }

```
Using the Facade
First, ensure the facade is registered in config/app.php (or via auto-discovery):

```php
'aliases' => [
    'Cloudinary' => Shorunke\Cloudinary\Facades\Cloudinary::class,
],

```
Then use it globally:

```php
use Cloudinary;

Cloudinary::upload('path/to/file.jpg', 'uploads');

```

## 📦 Available Methods
```php
// Upload a file
upload(string $filePath, string $folder, ?string $publicId = null, array $options = [])

// Delete a file
delete(string $publicId, array $options = [])

// Move/Rename a file
move(string $fromPublicId, string $toPublicId, array $options = [])

// Extract public ID from a full Cloudinary URL
$publicId = extractCloudinaryPublicId(string $url)

$url = $result['secure_url'];
```

## 📚 Credits

Developed by Shorunke Olamilekan
Email : Shorunke99@gmail.com
Powered by Cloudinary PHP SDK