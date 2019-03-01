#! /bin/bash
git add .
git commit -m '生成更新列表'
git push
php artisan cms:create-update-file
git checkout master
git merge dev
git checkout dev