#! /bin/bash
git add .
git commit -m '阶段完成'
git push
php artisan cms:create-update-file
git add .
git commit -m '新版发布'
git push
git push gitee
git checkout master
git merge dev
git push
git push gitee
git checkout dev
time=$(date "+%Y%m%d%H%M")
rm -rf /Users/xj/online/public/zips
mkdir /Users/xj/online/public/zips
git archive --format zip --output ../online/public/zips/HDCMS-${time}.zip master