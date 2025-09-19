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

# TODO

1. Add errors layout and errors/403 and 404 pages
3. Bij andermans lijstje wordt die knop "💡 Idee"
4. Niet alle links werken (ici paris)
