## Folder directories

`retro` theme folder comes from `web/themes/custom/`.

`jobs` module folder comes from `web/module/custom/`.

`config` DB folder comes from Drupal `root` directory.

## How to run Tailwindcss

1. Go to `retro` theme root directory.

2. Run 
```
npx tailwindcss init
```
3. Run
```
npx tailwindcss -i ./css/input.css -o ./css/output.css --watch
```

## How to use `config` DB folder.
Run
```
drush cim
```