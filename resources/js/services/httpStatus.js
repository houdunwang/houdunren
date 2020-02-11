export default status => {
    let message = "";
    switch (status) {
        case 400:
            message = "请求错误(400)";
            break;
        case 401:
            message = "请求要求用户的身份认证(401)";
            break;
        case 403:
            message = "拒绝访问(403)";
            break;
        case 404:
            message = "访问页面不存在(404)";
            break;
        case 408:
            message = "请求超时(408)";
            break;
        case 500:
            message = "服务器错误(500)";
            break;
        case 501:
            message = "服务未实现(501)";
            break;
        case 502:
            message = "网络错误(502)";
            break;
        case 503:
            message = "服务不可用(503)";
            break;
        case 504:
            message = "网络超时(504)";
            break;
        case 505:
            message = "HTTP版本不受支持(505)";
            break;
        default:
            message = `连接出错(${status})!`;
    }
    return message;
};
