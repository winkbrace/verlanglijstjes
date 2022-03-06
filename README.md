# Verlanglijstjes

This is a test project to build an app using the latest Laravel tools and Tailwind.

# Serve

```shell
sail up
```

Then view on http://localhost

# Populating new data

With the latest rebuild, there is a little more data to fetch. This is designed to run on development once.

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

# TODO

2. When adding a wish, run Embed to fetch the link preview data
3. Add errors layout and errors/403 and 404 pages
4. Add gast account

# Deployment

1. On first deploy remember to set APP_BASE_PATH, APP_URL, SESSION_DOMAIN, etc in the env file
2. 
