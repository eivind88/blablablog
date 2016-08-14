#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

php $(dirname $DIR)/artisan migrate:refresh && php $(dirname $DIR)/ composer.phar dump-autoload && php $(dirname $DIR)/artisan db:seed -vvv
