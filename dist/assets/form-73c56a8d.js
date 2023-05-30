import{G as I,o as L,n as N,k as R,l as A,B as Q,H as S}from"./element-plus-269c9c95.js";import{_ as T}from"./error-c67a23aa.js";import{_ as $}from"./markdownEditor-67a8e707.js";import{_ as J}from"./card-5e9a267c.js";import{u as K}from"./useQuestion-c1983c4c.js";import{c as M}from"./index-28f279b5.js";import{L as P}from"./layout-dd0055be.js";import{F as q,bF as D,o as f,J as O,K as e,Q as s,b as o,a as r,u as t,c as y,a8 as W,S as X}from"./@vue-fc98776d.js";import"./lodash-es-d29772ce.js";import"./async-validator-dee29e8b.js";import"./@vueuse-338b0492.js";import"./@element-plus-828baf85.js";import"./dayjs-2fa04b10.js";import"./@kangc-b0092abd.js";import"./vue-d4d0ec31.js";import"./@sxzz-c75af06c.js";import"./escape-html-9595eff5.js";import"./normalize-wheel-es-ed76fb12.js";import"./@ctrl-f8748455.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./useUpload-b067b045.js";import"./pinia-883c818f.js";import"./vue-demi-71ba0ef2.js";/* empty css                    */import"./vue-router-4dc5009b.js";import"./@icon-park-3742eccb.js";import"./axios-4a70c6fc.js";import"./prismjs-f5ad2561.js";import"./highlight.js-d90016de.js";import"./vee-validate-30786abe.js";import"./@vee-validate-f9e0ad5b.js";import"./yup-752d7be0.js";import"./property-expr-38205fa5.js";import"./toposort-39c4f588.js";const Y=r("div",{class:"flex items-center justify-between"},"题目类型",-1),Z=r("div",{class:"mt-2 text-sm"},"目前只允许前端题目",-1),ee=r("div",{class:"flex items-center justify-between"},[r("div",{class:"flex-1"},"问题描述"),r("div",{class:"text-sm text-gray-600"}," 因为每个考题只有2分钟，所以考题说明请尽量精简，否则会影响同学的交卷时间 ")],-1),oe={class:"flex flex-col gap-2"},te={class:""},le={class:"justify-center"},Se=q({__name:"form",async setup(ae){let m,b;const C=M(),{find:k,addItem:x,removeItem:h,update:v,model:l,setAnswer:w,changeType:V,add:E}=K(),d=C.routeParams("id");d&&(l.value=([m,b]=D(()=>k(d)),m=await m,b(),m));const U=async()=>{d?v():E()};return(ne,a)=>{const B=I,z=L,c=J,H=$,u=T,g=N,j=A,F=Q,G=S,_=R;return f(),O(P,null,{tip:e(()=>[s(" 感谢你出的题，帮助到努力前进的少年 ")]),default:e(()=>[o(c,{class:"col-span-8 mb-5"},{header:e(()=>[Y]),default:e(()=>[r("div",null,[o(z,{modelValue:t(l).category,"onUpdate:modelValue":a[0]||(a[0]=n=>t(l).category=n),size:"small"},{default:e(()=>[o(B,{label:"web"},{default:e(()=>[s("前端")]),_:1})]),_:1},8,["modelValue"]),Z])]),_:1}),o(c,{class:"col-span-8 mb-5"},{header:e(()=>[ee]),default:e(()=>[o(H,{modelValue:t(l).description,"onUpdate:modelValue":a[1]||(a[1]=n=>t(l).description=n)},null,8,["modelValue"]),o(u,{name:"description"})]),_:1}),o(c,{class:"col-span-8 mb-5"},{header:e(()=>[s("答题选项")]),footer:e(()=>[r("section",le,[o(_,{type:"primary",size:"default",onClick:U},{default:e(()=>[s("保存提交")]),_:1}),o(_,{type:"success",size:"default",onClick:t(x)},{default:e(()=>[s("添加选项")]),_:1},8,["onClick"])])]),default:e(()=>[r("section",oe,[r("div",te,[o(g,{modelValue:t(l).type,"onUpdate:modelValue":a[2]||(a[2]=n=>t(l).type=n),label:"radio",onChange:t(V)},{default:e(()=>[s("单选题")]),_:1},8,["modelValue","onChange"]),o(g,{modelValue:t(l).type,"onUpdate:modelValue":a[3]||(a[3]=n=>t(l).type=n),label:"checkbox",onChange:t(V)},{default:e(()=>[s("多选题")]),_:1},8,["modelValue","onChange"])]),(f(!0),y(X,null,W(t(l).lists,(n,p)=>(f(),y("div",{class:"flex items-center gap-2",key:p},[o(j,{modelValue:n.title,"onUpdate:modelValue":i=>n.title=i,placeholder:"请输入问题选项",size:"large",clearable:""},null,8,["modelValue","onUpdate:modelValue"]),o(G,{modelValue:t(l).answer,"onUpdate:modelValue":a[4]||(a[4]=i=>t(l).answer=i),size:"large"},{default:e(()=>[o(F,{label:p,border:"",onChange:i=>t(w)(p)},{default:e(()=>[s(" 正确答案 ")]),_:2},1032,["label","onChange"])]),_:2},1032,["modelValue"]),o(_,{size:"large",onClick:i=>t(h)(p),plain:"",color:"#d35400"},{default:e(()=>[s("删除")]),_:2},1032,["onClick"])]))),128)),o(u,{name:"answer"}),o(u,{name:"lists"})])]),_:1})]),_:1})}}});export{Se as default};
