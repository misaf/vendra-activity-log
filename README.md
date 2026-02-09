# Vendra Activity Log

Tenant-aware activity logging for Vendra applications.

## Features

- Tenant-scoped activity logs
- Filament resource and widget on the `admin` panel
- Translation and migration publishing support

## Requirements

- PHP 8.2+
- Laravel 11 or 12
- Filament 4
- `misaf/vendra-tenant`
- `misaf/vendra-user`
- `spatie/laravel-activitylog`

## Installation

```bash
composer require misaf/vendra-activity-log
php artisan vendor:publish --tag=activitylog-migrations
php artisan vendor:publish --tag=vendra-activity-log-migrations
php artisan migrate
```

Set the activity model in `config/activitylog.php`:

```php
'activity_model' => \Misaf\VendraActivityLog\Models\ActivityLog::class,
```

Optional translations publish:

```bash
php artisan vendor:publish --tag=vendra-activity-log-translations
```

## Usage

Use Spatie activity logging as usual:

```php
activity()
    ->causedBy(auth()->user())
    ->performedOn($model)
    ->withProperties(['key' => 'value'])
    ->log('Did something');
```

In Filament, logs are available on the `admin` panel.

## Testing

```bash
composer test
```

## License

MIT. See [LICENSE](LICENSE).
