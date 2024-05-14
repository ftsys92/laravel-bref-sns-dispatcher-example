.PHONY: all
all: help

.PHONY: down
down: ## Shut down all the running container services
	@echo "+ $@"
	@docker compose down

.PHONY: up
up: ## Run the all container services
	@echo "+ $@"
	@docker compose up -d --wait --build -d

.PHONY: setup
setup: ## Install the project dependencies
	@echo "+ $@"
	@rm -f .env
	@cp .env.example .env
	@docker compose run --user $$(id -u):$$(id -g) app composer install --no-scripts
	@docker compose run --user $$(id -u):$$(id -g) app php artisan key:generate --force

.PHONY: php-unit
php-unit: ## Run PHPUnit tests
	@docker compose run --user $(id -u):$(id -g) app php vendor/bin/phpunit
