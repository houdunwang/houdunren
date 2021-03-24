<?php

namespace App\Services\Site;

use App\Models\Site;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\Exception\ConflictingHeadersException;
use UserService;

/**
 * 站点服务
 * @package App\Services\Site
 */
class SiteService
{
    /**
     * 根据域名获取站点
     * @return null|Site
     * @throws BindingResolutionException
     * @throws SuspiciousOperationException
     * @throws ConflictingHeadersException
     */
    public function getByDomain(): ?Site
    {
        $host = parse_url(request()->url())['host'];
        return Site::where('domain', 'regexp', 'https?:\/\/' . $host)->first();
    }

    /**
     * 缓存或读取当前站点
     * @param Site|null $site
     * @return Site|null
     */
    public function cache(?Site $site = null): ?Site
    {
        static $cache = null;
        if (is_null($site)) return $cache;
        config('app.url', $site->domain);
        $this->initConfig($site);
        return $cache = $site;
    }

    /**
     * 加载站点配置
     * @param Site $site
     * @return void
     */
    public function initConfig(Site $site)
    {
        config(['site' => $site['config']]);
        config(['app.name' => $site['title']]);
        //邮件配置
        config(['mail.mailers.smtp' =>  config('site.email')]);
        config(['mail.from' => ['address' => config('site.email.username'), 'name' => $site['title']]]);
        //微信网页登录
        config(['services.weixinweb' => [
            'client_id' => config('site.user.wechatweb_client_id'),
            'client_secret' => config('site.user.wechatweb_client_secret'),
            'redirect' => route("wechat.login.callback"),
        ]]);
        //微信客户端登录
        $wechat = $site->loginWechat;
        if ($wechat) {
            config(['services.weixin' => [
                'client_id' => config('site.user.wechat_appid'),
                'client_secret' => config('site.user.wechat_appsecret'),
                'redirect' => route("wechat.login.callback"),
            ]]);
        }
    }

    /**
     * 站点管理员
     *
     * @param Site $site
     * @param User $user
     * @return boolean
     */
    public function isMaster(Site $site, User $user)
    {
        return UserService::isMaster($site, $user);
    }
}
