# Verlanglijstjes

This is a test project to build an app using the latest Laravel tools and Tailwind.

# Serve

```shell
sail up
```

Then view on http://localhost

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

- Don't forget to upload the hidden dotfiles too (`.env` and `.htaccess`) — some FTP clients/file managers hide these by default.
- Edit `index.php` to adjust the include paths if the app isn't served from the document root.
- If you rotate `APP_KEY` after deploying, old sessions become undecryptable — clear `storage/framework/sessions/*` afterwards.
- After changing `.env`, delete `bootstrap/cache/config.php` if it exists (equivalent to `artisan config:clear`, which you may not be able to run on shared hosting).
- If you get CSRF/419 errors on every form submission, check `SESSION_DOMAIN` in `.env`. If it doesn't exactly match the domain in the browser's address bar, the browser silently rejects the session cookie (visible as an "Invalid Domain attribute" warning next to the `Set-Cookie` header in DevTools), so no session/CSRF token ever persists between requests. Leave it empty/unset unless you need a specific value.

# TODO

1. Add errors layout and errors/403 and 404 pages
2. Niet alle link preview data wordt goed opgehaald door embed/embed op productie, maar wel lokaal... :/
   - voorbeeld: https://www.bol.com/nl/nl/p/kookbijbels-34-eenpansbijbel/9300000154345734/?referrer=socialshare_pdp_androidapp
