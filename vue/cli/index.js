#!/usr/bin/env node

/**
 * houdunren-vue
 * 后盾人前端脚手架
 * @author 向军大叔 <https://www.houdurnen.com>
 */
import chalk from 'chalk'
import inquirer from 'inquirer'
import fs from 'fs-extra'
import { createSpinner } from 'nanospinner'
import { download } from 'obtain-git-repo'
import figlet from 'figlet'
import terminalLink from 'terminal-link'
import axios from 'axios'
import adm_zip from 'adm-zip'
async function run() {
  figlet('houdunren.com', async function (err, data) {
    //打印文字图案
    console.log(data)
    //可点击链接
    console.log(
      chalk.green(
        `欢迎使用后盾人前端脚手架，向军大叔每晚8点在抖音与B站直播，请搜索【后盾人】关注。\n 下载来源于 Github，如果下载失败请访问 https://gitee.com/houdunren/vue`,
      ),
    )

    //询问用户
    const message = await inquirer.prompt({
      name: 'dirname',
      type: 'input',
      message: '请输入目录名',
      default() {
        return 'vue'
      },
    })

    //目录是否已经存在
    const dirIsExists = fs.existsSync(message.dirname)

    if (dirIsExists) {
      console.log(chalk.redBright('目录已经存在'))
    } else {
      //显示下载动画
      const spinner = createSpinner('开始下载...').start()
      //下载压缩包
      // const { data } = await axios({
      //   url: 'https://houdunren-soft.oss-cn-hangzhou.aliyuncs.com/vue-master.zip',
      //   timeout: 10000,
      //   headers: {
      //     'Content-Type': 'multipart/form-data',
      //   },
      //   responseType: 'arraybuffer',
      // })
      // await fs.promises.writeFile(`vue-master.zip`, data, 'binary')
      //解压缩
      // const unzip = new adm_zip('vue-master.zip')
      // unzip.extractAllTo('.', true)
      // fs.unlinkSync('vue-master.zip')
      //移动解压缩文件
      // fs.moveSync('vue-master', message.dirname, { overwrite: true })
      // spinner.success({ text: '项目创建成功，请依次执行以下命令' })

      //下载git代码
      download('direct:https://github.com/houdunwang/vue', message.dirname, { clone: true }, function (err) {
        if (err) {
          spinner.error({ text: '下载失败' })
        } else {
          spinner.success({
            text: '项目创建成功，请依次执行以下命令',
          })
          console.log(chalk.white(`cd ${message.dirname}`))
          console.log(chalk.white('pnpm i'))
          console.log(chalk.white('pnpm run dev'))
          return
        }
      })
    }
  })
}

run()
