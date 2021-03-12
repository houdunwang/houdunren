export default sid => [
    { title: '公众号列表', name: 'wechat.wechat.index', params: { sid } },
    { title: '消息列表', name: 'wechat.message.index', current: true }
]
