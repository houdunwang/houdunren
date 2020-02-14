import Main from '../../app/system/Main'
import config from './config'
//系统配置主文件

export default {
    path: '/system',
    component: Main,
    children: [
        ...config,
    ]
};
