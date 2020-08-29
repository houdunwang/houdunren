<?php

namespace Houdunwang\WeChat\Message;

trait Send
{
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

        return sprintf(
            $xml,
            $this->message->FromUserName,
            $this->message->ToUserName,
            time(),
            $content
        );
    }

    public function image(string $media_id)
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

        return sprintf(
            $xml,
            $this->message->FromUserName,
            $this->message->ToUserName,
            time(),
            $media_id
        );
    }

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
        $articleXml = <<<php
<item>
<Title><![CDATA[title1]]></Title>
<Description><![CDATA[description1]]></Description>
<PicUrl><![CDATA[picurl]]></PicUrl>
<Url><![CDATA[url]]></Url>
</item>
php;
        foreach ($data as $article) {
            $news .= sprintf(
                $articleXml,
                $article['title'],
                $article['description'],
                $article['picurl'],
                $article['url']
            );
        }
        return sprintf(
            $xml,
            $this->message->FromUserName,
            $this->message->ToUserName,
            time(),
            count($data),
            $news
        );
    }
}
