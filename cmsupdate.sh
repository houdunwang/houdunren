#! /bin/bash
git add .
git commit -m '生成编译版本号'
git push
php artisan cms:create-update-file
git add .
git commit -m '生成更新列表'
git push
git checkout master
git merge dev
git checkout dev