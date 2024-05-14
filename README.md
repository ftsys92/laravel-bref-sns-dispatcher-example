# Laravel Bref Sns Dispatcher Example

## Local development
```bash
make setup
make up
```

### Running commands in container
```bash
docker compose run --user $(id -u):$(id -g) worker composer require some-package
docker compose run --user $(id -u):$(id -g) worker php artisan cache:clear
```

### Running tests
```bash
make php-unit
```

## Deployment
Make sure you done [Bref setup step](https://bref.sh/docs/setup) and already have AWS credentials configured.

Once done, go to `AWS Systems Manager -> Parameter Store` in AWS Console and create next parameters in the same region as this app (`us-east-1`):
 - `/sandbox/laravel-bref-sns-dispatcher-example/app-key`

They are required for application to run.

Once done, run:
```bash
serverless deploy
```

## Usage
### Publishing a message
```bash
curl -H 'Content-Type: application/json' \
    -d '{ "message":"Game Over!"}' \
    -X POST \
    http://localhost/api/sns/publish
```

Replace `http://localhost` with endpoint url you got once deployment finished to test it on AWS.
