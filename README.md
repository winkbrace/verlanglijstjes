# Verlanglijstjes

Laravel application to run the family's wish list application.

# Serve

```shell
sail up
```

Then view on http://localhost (also reachable from Docker Desktop)

Front-end assets are built with Vite (Node `^20.19` or `>=22.12`). Run `npm run dev` while developing, or `npm run build` once. Without either, pages fail with a missing Vite manifest error.

# Populating new data

Just download from production.

## link previews

To fetch link previews of stored wish links, run:
```shell
sail artisan fetch:link-previews
```

## avatars

To fetch initial avatars of everyone, run this command to fetch them from multiavatar based on their name.
It will store them at `public/img/avatar-NAME.svg`.
```shell
sail artisan fetch:avatars
```

Note: after running that script I manually updated avatars for people who got an ugly one. Very easy, actually.

# Google OAuth 2.0
Guest users can login using their Google account. To configure this, visit [the Google API Console](https://console.cloud.google.com/auth/clients?authuser=1&project=verlanglijstjes&supportedpurview=project).

# Deploying to shared host

- Build `vendor/` for production with `composer install --no-dev --optimize-autoloader` and upload it completely. Run `composer install` afterwards to get the dev dependencies back locally.
- Build the front-end with `npm ci && npm run build` and upload `public/build/` completely. It is not in git.
- Uploading doesn't delete files that were removed from the repository. Delete them on the server too, or replace `app/`, `bootstrap/`, `config/`, `lang/`, `resources/` and `routes/` as a whole. A leftover `resources/lang` directory makes Laravel ignore `lang/`, including the Dutch translations.
- After uploading code changes, delete `bootstrap/cache/packages.php` and `bootstrap/cache/services.php` (and `config.php`, see below). Laravel regenerates them on the next request.
- Don't forget to upload the hidden dotfiles too (`.env` and `.htaccess`) — some FTP clients/file managers hide these by default.
- Edit `index.php` to adjust the include paths if the app isn't served from the document root.
- If you rotate `APP_KEY` after deploying, old sessions become undecryptable — clear `storage/framework/sessions/*` afterwards.
- After changing `.env`, delete `bootstrap/cache/config.php` if it exists (equivalent to `artisan config:clear`, which you may not be able to run on shared hosting).
- If you get CSRF/419 errors on every form submission, check `SESSION_DOMAIN` in `.env`. If it doesn't exactly match the domain in the browser's address bar, the browser silently rejects the session cookie (visible as an "Invalid Domain attribute" warning next to the `Set-Cookie` header in DevTools), so no session/CSRF token ever persists between requests. Leave it empty/unset unless you need a specific value.

## One-time: upgrading production from Laravel 10 to 13

1. Check that the host runs PHP 8.4 or newer.
2. `public/index.php` is completely different in Laravel 13. Upload the new one and re-apply the include-path edits for the host to its two `require` lines:
   ```php
   require __DIR__.'/../vendor/autoload.php';
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```
   (and the `maintenance.php` path above them).
3. Delete these removed files and directories on the server:
   - `app/Console/Kernel.php`, `app/Http/Kernel.php`, `app/Exceptions/Handler.php`
   - `app/Providers/AuthServiceProvider.php`, `BroadcastServiceProvider.php`, `EventServiceProvider.php`, `RouteServiceProvider.php`
   - everything in `app/Http/Middleware/` except `RedirectIfGuest.php`
   - `app/Http/Controllers/Auth/RegisteredUserController.php`, `resources/views/auth/register.blade.php`
   - `routes/channels.php`
   - `resources/lang/`, `lang/en/`, `lang/en.json`, `lang/nl/pagination.php`, `lang/nl/validation-inline.php`
4. Upload a fresh `vendor/`, then clear `bootstrap/cache/*.php`.
5. There are no new migrations. Sessions, cookies and `APP_KEY` are unchanged, so logged-in users should stay logged in.
6. Smoke test: home, a wish list, login, Google login, claiming and unclaiming a wish, and `/refresh-link-previews`.

## One-time: switching production from Laravel Mix to Vite

1. Run `npm ci && npm run build` locally and upload `public/build/`.
2. Upload the changed `resources/views/`, `app/View/Components/WishButton.php` and `public/js/family-tree.js`.
3. Delete the old Mix output on the server: `public/css/`, `public/js/app.js`, `public/js/treant.js` and `public/mix-manifest.json`. Keep `public/js/family-tree.js`.
4. Smoke test: the family tree on the home page, the navigation dropdown, claiming a wish, and the error toast when deleting fails.

# TODO

1. Add errors layout and errors/403 and 404 pages
2. Niet alle link preview data wordt goed opgehaald door embed/embed op productie, maar wel lokaal... :/
   - voorbeeld: https://www.bol.com/nl/nl/p/kookbijbels-34-eenpansbijbel/9300000154345734/?referrer=socialshare_pdp_androidapp
3. Users should be able to change their avatar by uploading their own image file.
4. Change the family chart when user is logged in, so that the user's own branch is on the left. 
5. On iPhone, claiming a wish is not properly visualized.
