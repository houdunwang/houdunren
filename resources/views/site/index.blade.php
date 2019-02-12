@extends('layouts.admin')
@section('content')
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i></li>
            <li><a href="#">首页</a></li>
            <li>网站列表</li>
        </ol>
        <div class="alert alert-success">
            温馨提示：
            <i class="fa fa-info-circle"></i>
            Hi，<span class="text-strong">admin</span> 您是系统超级管理员不受任何功能限制。
        </div>
        <div class="clearfix">
            <div class="input-group">
                <a href="?s=system/site/addSite" class="btn btn-primary"><i class="fa fa-plus"></i> 添加网站</a>
            </div>
        </div>
        <br>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">筛选</h3>
            </div>
            <div class="panel-body">
                <form action="?s=system/site/lists" method="post" class="form-horizontal" role="form">
                    <input type='hidden' name='csrf_token' value='83eec0eb2f14a9a921d38f8b492d41eb'/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">搜索</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" id="sitename" name="sitename"
                                       placeholder="请输入网站名称">
                                <input type="text" class="form-control hide" id="domain" name="domain"
                                       placeholder="请输入网站域名">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i> 搜索
                                    </button>
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#"
                                               onclick="$('#domain').addClass('hide').val('');$('#sitename').removeClass('hide')">根据网站名称搜索</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                               onclick="$('#sitename').addClass('hide').val('');$('#domain').removeClass('hide')">根据公众号中称搜索</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=11" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                后盾网</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="接入状态: 接入成功">
                                <i class="fa fa-check-circle fa-2x text-success"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            2017-04-09 ~
                            2022-12-16
                            &nbsp;&nbsp;&nbsp;站长 : hdxj                                (后盾人官方)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=11">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=11">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=11">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(11,'后盾网')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=11">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=12" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                HDCMS</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="公众号接入失败,请重新修改公众号配置文件并进行连接测试.">
                                <i class="fa fa-times-circle fa-2x text-warning"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            2017-04-09 ~
                            2022-12-16
                            &nbsp;&nbsp;&nbsp;站长 : hdxj                                (后盾人官方)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=12">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=12">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=12">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(12,'HDCMS')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=12">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=13" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                HDPHP</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="公众号接入失败,请重新修改公众号配置文件并进行连接测试.">
                                <i class="fa fa-times-circle fa-2x text-warning"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            2017-04-09 ~
                            2022-12-16
                            &nbsp;&nbsp;&nbsp;站长 : hdxj                                (后盾人官方)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=13">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=13">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=13">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(13,'HDPHP')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=13">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=18" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                后盾人</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="接入状态: 接入成功">
                                <i class="fa fa-check-circle fa-2x text-success"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            2017-04-09 ~
                            2022-12-16
                            &nbsp;&nbsp;&nbsp;站长 : hdxj                                (后盾人官方)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=18">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=18">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=18">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(18,'后盾人')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=18">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=21" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                通辽人</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="接入状态: 接入成功">
                                <i class="fa fa-check-circle fa-2x text-success"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            2017-04-10 ~
                            2019-05-10
                            &nbsp;&nbsp;&nbsp;站长 : wubin                                (体验组)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=21">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=21">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=21">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(21,'通辽人')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=21">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="col-xs-6" style="position: relative">
                            <span>
                                套餐:
                                                                                                                                </span>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=site/entry/home&siteid=22" class="text-info">
                                <strong><i class="fa fa-cog"></i> 管理站点</strong>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body clearfix" style="padding:8px 15px;">
                        <div class="col-xs-4 col-md-1">
                            <i class="fa fa-rss fa-4x"></i>

                        </div>
                        <div class="col-xs-4 col-md-5">
                            <h4 style="line-height:35px;overflow: hidden;height:30px;">
                                ccc</h4>
                        </div>
                        <div class="col-xs-4 col-md-6 text-right"
                             style="line-height:60px;height:45px;">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="top"
                               title="公众号接入失败,请重新修改公众号配置文件并进行连接测试.">
                                <i class="fa fa-times-circle fa-2x text-warning"></i>
                            </a>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <div class="col-xs-6">
                            服务有效期 :
                            无限制

                            &nbsp;&nbsp;&nbsp;站长 : liyalong                                (体验组)

                        </div>
                        <div class="col-xs-6 text-right">
                            <a href="?s=system/site/access_setting&siteid=22">
                                <i class="fa fa-key"></i> 设置权限
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/wechat&step=wechat&siteid=22">
                                <i class="fa fa-comment-o"></i> 微信公众号
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/permission/users&siteid=22">
                                <i class="fa fa-user"></i>操作员管理
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;"
                               onclick="delSite(22,'ccc')">
                                <i class="fa fa-trash"></i> 删除
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href="?s=system/site/edit&siteid=22">
                                <i class="fa fa-pencil-square-o"></i> 编辑
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('js')
    <script>
        function destroy(bt) {
            require(['hdjs'], function (hdjs) {
                hdjs.confirm('确定删除站点吗？', function () {
                    $(bt).next('form').submit();
                });
            })
        }
    </script>
@endpush