#!/bin/bash

apt-get update
apt-get install php5-pgsql
apt-get install php5-sqlite


echo 'alias art="php artisan"' >> ~/.bashrc
echo 'alias t="vendor/bin/phpunit"' >> ~/.bashrc

. ~/.bashrc
