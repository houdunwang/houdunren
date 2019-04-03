#! /bin/bash
git add .
git commit -m '阶段完成'
git push
php artisan cms:create-update-file
git add .
git commit -m '新版发布'
git push
git checkout master
git merge dev
git push
git checkout dev
time=$(date "+%Y%m%d%H%M")
git archive --format zip --output public/zips/HDCMS-${time}.zip master