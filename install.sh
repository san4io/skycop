#!/usr/bin/env bash

composer install
php bin/console doctrine:schema:update -f