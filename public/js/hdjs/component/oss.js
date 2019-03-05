define([
    'plupload',
    'webuploader',
    'css!less/oss.css'
], function (plupload) {
    return {
        upload:function(options){
            accessid = ''
            accesskey = ''
            host = ''
            policyBase64 = ''
            signature = ''
            callbackbody = ''
            filename = ''
            key = ''
            expire = 0
            g_object_name = ''
            g_object_name_type = ''
            now = timestamp = Date.parse(new Date()) / 1000;

            function send_request()
            {
                var xmlhttp = null;
                if (window.XMLHttpRequest)
                {
                    xmlhttp=new XMLHttpRequest();
                }
                else if (window.ActiveXObject)
                {
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }

                if (xmlhttp!=null)
                {
                    // serverUrl = 'http://houdunren.hdcms.com?s=component/oss/sign&m=houdunren&siteid=18'
                    xmlhttp.open( "GET", options.serverUrl+'&dir='+options.dir, false );
                    xmlhttp.send( null );
                    return xmlhttp.responseText
                }
                else
                {
                    alert("Your browser does not support XMLHTTP.");
                }
            };

            function check_object_radio() {
                g_object_name_type = options.name_type;
                // var tt = document.getElementsByName('myradio');
                // for (var i = 0; i < tt.length ; i++ )
                // {
                //     if(tt[i].checked)
                //     {
                //         g_object_name_type = tt[i].value;
                //         break;
                //     }
                // }
            }

            function get_signature()
            {
                //可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
                now = timestamp = Date.parse(new Date()) / 1000;
                if (expire < now + 3)
                {
                    body = send_request()
                    var obj = eval ("(" + body + ")");
                    host = obj['host']
                    policyBase64 = obj['policy']
                    accessid = obj['accessid']
                    signature = obj['signature']
                    expire = parseInt(obj['expire'])
                    callbackbody = obj['callback']
                    key = obj['dir']
                    return true;
                }
                return false;
            };

            function random_string(len) {
                len = len || 32;
                var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
                var maxPos = chars.length;
                var pwd = '';
                for (i = 0; i < len; i++) {
                    pwd += chars.charAt(Math.floor(Math.random() * maxPos));
                }
                return pwd;
            }

            function get_suffix(filename) {
                pos = filename.lastIndexOf('.')
                suffix = ''
                if (pos != -1) {
                    suffix = filename.substring(pos)
                }
                return suffix;
            }

            function calculate_object_name(filename)
            {
                if (g_object_name_type == 'local_name')
                {
                    g_object_name += "${filename}"
                }
                else if (g_object_name_type == 'random_name')
                {
                    suffix = get_suffix(filename)
                    g_object_name = key + random_string(10) + suffix
                }
                return ''
            }

            function get_uploaded_object_name(filename)
            {
                if (g_object_name_type == 'local_name')
                {
                    tmp_name = g_object_name
                    tmp_name = tmp_name.replace("${filename}", filename);
                    return tmp_name
                }
                else if(g_object_name_type == 'random_name')
                {
                    return g_object_name
                }
            }

            function set_upload_param(up, filename, ret)
            {
                if (ret == false)
                {
                    ret = get_signature()
                }
                g_object_name = key;
                if (filename != '') {
                    suffix = get_suffix(filename)
                    calculate_object_name(filename)
                }
                new_multipart_params = {
                    'key' : g_object_name,
                    'policy': policyBase64,
                    'OSSAccessKeyId': accessid,
                    'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
                    'callback' : callbackbody,
                    'signature': signature,
                };

                up.setOption({
                    'url': host,
                    'multipart_params': new_multipart_params
                });

                up.start();
            }

            var uploader = new plupload.Uploader({
                runtimes : 'html5,flash,silverlight,html4',
                browse_button : options.pick,
                //multi_selection: false,
                // container: document.getElementById('container'),
                // flash_swf_url : window.hdjs.base+'/package/oss/lib/plupload-2.1.2/js/Moxie.swf',
                // silverlight_xap_url : window.hdjs.base+'/package/oss/lib/plupload-2.1.2/js/Moxie.xap',
                url : 'http://oss.aliyuncs.com',
                filters: {
                    mime_types : options.filters.mime_types,
                    max_file_size : options.filters.max_file_size, //最大只能上传10mb的文件
                    prevent_duplicates : options.filters.prevent_duplicates //不允许选取重复文件
                },

                init: {
                    PostInit: function() {
                        // document.getElementById('ossfile').innerHTML = '';
                        document.getElementById(options.upButton).onclick = function() {
                            set_upload_param(uploader, '', false);
                            return false;
                        };
                    },
                    //添加文件到队列
                    FilesAdded: function(up, files) {
                        options.event.select(files[files.length-1]);
                        return;
                        plupload.each(files, function(file) {
                            document.getElementById('ossfile').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'
                                +'<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
                                +'</div>';
                        });
                    },

                    BeforeUpload: function(up, file) {
                        check_object_radio();
                        set_upload_param(up, file.name, true);
                        options.event.start(up,file);
                    },

                    UploadProgress: function(up, file) {
                        options.event.progress(up,file);
                    },

                    FileUploaded: function(up, file, info) {
                        if (info.status == 200)
                        {
                            file.name = get_uploaded_object_name(file.name);
                            options.event.success(up,file,info);
                        }
                        else
                        {
                            options.event.error(up,file,info);
                        }
                    },
                    Error: function(up, err) {
                        if (err.code == -600) {
                            alert("\n选择的文件太大了,请更改 max_file_size 属性");
                        }
                        else if (err.code == -601) {
                            alert("\n选择的文件后缀不对, 请更改 mime_types 属性");
                        }
                        else if (err.code == -602) {
                            alert("\n这个文件已经上传过一遍了");
                        }
                        else
                        {
                            alert("\nError xml:" + err.response);
                        }
                    }
                }
            });

            uploader.init();
        }
    }
})