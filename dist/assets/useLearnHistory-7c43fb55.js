import{h as e}from"./index-28f279b5.js";const i=()=>({videoDynamics:async()=>await e.request({url:"learn/history/videos"}),lessonVideo:async s=>await e.request({url:`learn/history/lessonVideos/${s}`}),userVideos:async(s,r=1)=>await e.request({url:`learn/history/user/${s}?page=${r}`})});export{i as u};
