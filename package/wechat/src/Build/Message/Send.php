<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build\Message;

/**
 * 消息回复
 * Trait Send
 * @package Houdunwang\WeChat\Build\Message
 */
trait Send
{
    //回复文本
    protected static $REPLY_TYPE_TEXT = 'text';
    //回复图文
    protected static $REPLY_TYPE_IMAGE = 'image';
    //回复语音
    protected static $REPLY_TYPE_VOICE = 'voice';
    //回复视频
    protected static $REPLY_TYPE_VIDEO = 'video';
    //音乐消息
    protected static $REPLY_TYPE_MUSIC = 'music';
    //图文信息
    protected static $REPLY_TYPE_NEWS = 'news';

    /**
     * 回复文本消息
     * @param string $content
     * @return string
     */
    public function text(string $content): string
    {
        header('Content-type:application/xml');
        $xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>';
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_TEXT, $content);
    }

    /**
     * 回复图片消息
     * @param string $media_id
     * @return string
     */
    public function image(string $media_id): string
    {
        $xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>';
        header('Content-type:application/xml');
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_IMAGE, $media_id);
    }

    /**
     * 回复语音消息
     * @param string $media_id
     * @return string
     */
    public function voice(string $media_id): string
    {
        $xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Voice>
<MediaId><![CDATA[%s]]></MediaId>
</Voice>
</xml>';
        header('Content-type:application/xml');
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_VOICE, $media_id);
    }

    /**
     * 回复视频消息
     * @param string $video
     * @return string
     */
    public function video(string $video): string
    {
        $xml
            = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video>
</xml>';
        header('Content-type:application/xml');
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_VIDEO,
            $video['media_id'], $video['title'], $video['description']);
    }

    /**
     * 回复音乐消息
     * @param string $music
     * @return string
     */
    public function music(string $music): string
    {
        $xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>';
        header('Content-type:application/xml');
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_MUSIC,
            $music['title'], $music['description'], $music['musicurl'], $music['hqmusicurl'], $music['thumbmediaid']);
    }

    /**
     * 回复图文信息
     * @param array $news
     * @return string
     */
    public function news(array $news):string
    {
        $xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
%s
</Articles>
</xml>';
        $item = '<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>';
        $items = '';
        foreach ((array)$news as $n) {
            $items .= sprintf($item, $n['title'], $n['discription'], $n['picurl'], $n['url']);
        }
        header('Content-type:application/xml');
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), self::$REPLY_TYPE_NEWS, count($news), $items);
    }
}
