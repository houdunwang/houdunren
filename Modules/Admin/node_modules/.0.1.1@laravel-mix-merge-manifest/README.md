# Laravel Mix - Merge Manifest

This extension support multi mix configration without overwriting the mix-manifest.json file.

## Usage

First, install the extension.

```
npm install laravel-mix-merge-manifest --save-dev
```

Then, require it within your `webpack.mix.js` file, like so:

```js
let mix = require('laravel-mix');

require('laravel-mix-merge-manifest');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .less('resources/assets/less/app.less', 'public/css')
    .mergeManifest();
```