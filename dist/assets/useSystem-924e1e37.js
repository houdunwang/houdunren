import{h as a,r as i}from"./index-28f279b5.js";import{k as u}from"./@vueuse-338b0492.js";import{q as l}from"./qs-9ebea5eb.js";import{u as m}from"./vue-router-4dc5009b.js";import{E as d}from"./element-plus-269c9c95.js";import{r as o}from"./@vue-fc98776d.js";const g=()=>{const r=o(),t=o({title:"",description:"",preview:"",download_address:"",type:"system"});return m(),{findAll:async(e=1,s={})=>{r.value=await a.request({url:`system?page=${e}&`+l.stringify(s)})},collection:r,findOne:async e=>{t.value=await a.request({url:`system/${e}`});const s=u(null);s.value=t.value.title},model:t,update:async()=>{var e;await a.request({url:`system/${(e=t.value)==null?void 0:e.id}`,method:"PUT",data:t.value}),i.push({name:"admin.system"})},order:async e=>{await a.request({url:"system/order",method:"PUT",data:e})},add:async()=>{await a.request({url:"system",method:"POST",data:t.value})},remove:async e=>{try{await d.confirm("确定删除吗?","温馨提示"),await a.request({url:`system/${e}`,method:"DELETE"});const s=r.value.findIndex(n=>n.id==e);r.value.splice(s,1)}catch{}}}};export{g as u};
