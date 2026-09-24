# Verlanglijstjes

Laravel application to run the family's wish list application.

# Serve

```shell
sail up
```

Then view on http://localhost (also reachable from Docker Desktop)

Front-end assets are built with Vite (Node `>=22.12`). Run `npm run dev` while developing, or `npm run build` once. 
Without either, pages fail with a missing Vite manifest error.

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
- Build the front-end locally and upload `public/build/` completely to `build/` in the subdomain root, next to `index.php` (not into the app directory). It is not in git. It needs Node `>=22.12`:
  ```shell
  # nvm install 26
  nvm use 26
  node -v
  npm ci
  npm run build
  ```
  Every build gets new hashed filenames, so replace `build/` on the server as a whole instead of adding to it. 
  Stop `npm run dev` first and make sure no `public/hot` file ends up on the server: while it exists, Laravel loads the 
  assets from the Vite dev server instead of `public/build/`.
- Uploading doesn't delete files that were removed from the repository. Delete them on the server too, or replace `app/`, `bootstrap/`, `config/`, `lang/`, `resources/` and `routes/` as a whole. A leftover `resources/lang` directory makes Laravel ignore `lang/`, including the Dutch translations.
- After uploading code changes, delete `bootstrap/cache/packages.php` and `bootstrap/cache/services.php` (and `config.php`, see below). Laravel regenerates them on the next request.
- Don't forget to upload the hidden dotfiles too (`.env` and `.htaccess`) — some FTP clients/file managers hide these by default.
- Edit `index.php` to adjust the include paths if the app isn't served from the document root.
- If you rotate `APP_KEY` after deploying, old sessions become undecryptable — clear `storage/framework/sessions/*` afterwards.
- After changing `.env`, delete `bootstrap/cache/config.php` if it exists (equivalent to `artisan config:clear`, which you may not be able to run on shared hosting).
- If you get CSRF/419 errors on every form submission, check `SESSION_DOMAIN` in `.env`. If it doesn't exactly match the domain in the browser's address bar, the browser silently rejects the session cookie (visible as an "Invalid Domain attribute" warning next to the `Set-Cookie` header in DevTools), so no session/CSRF token ever persists between requests. Leave it empty/unset unless you need a specific value.

# TODO

1. Add errors layout and errors/403 and 404 pages
2. Niet alle link preview data wordt goed opgehaald door embed/embed op productie, maar wel lokaal... :/
   - voorbeeld: https://www.bol.com/nl/nl/p/kookbijbels-34-eenpansbijbel/9300000154345734/?referrer=socialshare_pdp_androidapp
3. Users should be able to change their avatar by uploading their own image file.
4. Change the family chart when user is logged in, so that the user's own branch is on the left. 
5. On iPhone, claiming a wish is not properly visualized.
