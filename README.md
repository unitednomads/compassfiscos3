# PHP Sample script to upload a file to S3

### Dotenv

```
$ cp .env.sample .env
```

Set `AWS_ACCESS_KEY_ID` and `AWS_SECRET_ACCESS_KEY` in `.env`.

### Composer

```
$ composer install
$ php -S localhost:3333
```

Navigate to `http://localhost:3333` with your browser to upload `sample.txt`.