export default {
    msgtype: 'mpnews',
    send_ignore_reprint: 1,
    filter: {
        is_to_all: true,
        tag_id: 2
    },
    mpnews: {
        media_id: ''
    },
    text: {
        content: ''
    },
    voice: {
        media_id: ''
    },
    images: {
        media_ids: [],
        //推荐语，不填则默认为“分享图片”
        recommend: '',
        need_open_comment: 1,
        only_fans_can_comment: 0
    },
    mpvideo: {
        media_id: ''
    }
}
