# Foundation

This is the foundation plugin that should be included on all sites by Elli & Friends.

## Installation

```
composer require ellifriends/wp-ef-foundation
```

## Documentation

This plugin contains some helper functions:

- `asset('path/to/file')` will return the path to a file in the `assets` directory in the theme. There are a second optional argument that will change the directory to look in, default is `assets`
- `mix('path/to/file')` will check the content of `mix-manifest.json` and return the right file version or the file if it don't exists. There are a second optional argument that will change the directory to look in, default is `assets`

## License

MIT © Elli & Friends
