import{h as t,r,c as n}from"./index-28f279b5.js";import{q as m}from"./qs-9ebea5eb.js";import{E as u}from"./element-plus-269c9c95.js";import{r as c}from"./@vue-fc98776d.js";const{open:i}=n(),E=()=>{const s=c(),a=c();return{findAll:async(e,o={})=>{s.value=await t.request({url:`topic?page=${e}&`+m.stringify(o)})},collection:s,findOne:async e=>{a.value=await t.request({url:`topic/${e}`})},model:a,add:async e=>{const o=await t.request({url:"topic",method:"POST",data:e});i({name:"topic.show",params:{id:o.id}})},update:async e=>{await t.request({url:`topic/${e.id}`,method:"PUT",data:e}),i({name:"topic.show",params:{id:e.id}})},remove:async e=>{await u({message:"确定删除吗？"}),await t.request({url:`topic/${e}`,method:"DELETE"}),r.push({name:"topic"})},userToipcList:async(e,o=1)=>{s.value=await t.request({url:`topic/user/${e}?page=${o}`})},toggleRecommend:async e=>{a.value=await t.request({url:`topic/recommend/${e}`,method:"PUT"})},getRecommendList:async()=>await t.request({url:"topic/recommend"})}};export{E as u};
