<?php

namespace Houdunwang\WeChat\Message;

use Log;

/**
 * 回复被动消息
 */
trait Send
{
    /**
     * 文本回复
     * @param string $content
     * @return string
     */
    public function text(string $content)
    {
        $xml = <<<php
        <xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
        </xml>
php;

        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), $content);
    }

    /**
     * 图片消息
     * @param array $content
     * @return string
     */
    public function image(array $content)
    {
        $xml = <<<php
        <xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[image]]></MsgType>
            <Image>
                <MediaId><![CDATA[%s]]></MediaId>
            </Image>
        </xml>
php;
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(),  $content['media_id']);
    }

    /**
     * 语音消息
     * @param array $content
     * @return string
     */
    public function voice(array $content)
    {
        $xml = <<<php
        <xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[voice]]></MsgType>
            <Voice>
                <MediaId><![CDATA[%s]]></MediaId>
            </Voice>
        </xml>
php;
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(),  $content['media_id']);
    }

    /**
     * 视频消息
     * @param array $content
     * @return string
     */
    public function video(array $content)
    {
        $xml = <<<php
        <xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[video]]></MsgType>
            <Video>
                <MediaId><![CDATA[%s]]></MediaId>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[%s]]></Description>
            </Video>

        </xml>
php;
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(),  $content['media_id'], $content['title'], $content['description']);
    }


    /**
     * 图文消息
     * @param array $data
     * @return string
     */
    public function news(array $data)
    {
        $xml = <<<php
        <xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <ArticleCount>%s</ArticleCount>
        <Articles>
          %s
        </Articles>
      </xml>
php;

        $news = '';
        $articleXml = <<<xml
        <item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
      </item>
xml;
        foreach ($data as $article) {
            $news .= sprintf($articleXml, $article['title'], $article['description'], $article['picurl'], $article['url']);
        }
        return sprintf($xml, $this->FromUserName, $this->ToUserName, time(), count($data), $news);
    }
}
