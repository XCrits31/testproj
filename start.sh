#!/bin/bash
php artisan serve &> /dev/null &
npm run dev &> /dev/null &
firefox-developer-edition &> /dev/null &
echo "ready"
