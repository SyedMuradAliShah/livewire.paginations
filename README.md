# Livewire 3.4, Laravel 10.10

## Steps to generate error!

1. Clone this repo
2. Run `php artisan migrate --seed`
3. Run `php artisan serve`
4. Visit [localhost:8000](http://localhost:8000/) and check pagination links, it will work as expected. `?page=1`, `?page=2`, `?page=3`,etc
5. Now search anything, or click the search button.
6. Now check the pagination links again; it will be `http://localhost:8000/livewire/update?page=1`, `/livewire/update?page=2`, `/livewire/update?page=3` etc.

### NOTE
I'm using a custom pagination view.
