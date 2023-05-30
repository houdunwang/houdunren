import{k as T,u as q,v as A}from"./element-plus-269c9c95.js";import{_ as w}from"./card-5e9a267c.js";import{_ as $}from"./userAvatar.vue_vue_type_script_setup_true_lang-5d1165fd.js";import{d as k}from"./dayjs-2fa04b10.js";import{u as j}from"./useQuestionAnswer-8d8b4765.js";import{L as F,N as Q,_ as R}from"./@icon-park-3742eccb.js";import{F as C,bF as z,af as L,o as _,J as B,K as o,a as e,b as t,Q as s,c as b,a8 as V,u as c,S as N,R as l}from"./@vue-fc98776d.js";import{c as S}from"./index-28f279b5.js";import{L as U}from"./layout-dd0055be.js";import"./lodash-es-d29772ce.js";import"./async-validator-dee29e8b.js";import"./@vueuse-338b0492.js";import"./@element-plus-828baf85.js";import"./@sxzz-c75af06c.js";import"./escape-html-9595eff5.js";import"./@kangc-b0092abd.js";import"./vue-d4d0ec31.js";import"./normalize-wheel-es-ed76fb12.js";import"./@ctrl-f8748455.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./pinia-883c818f.js";import"./vue-demi-71ba0ef2.js";/* empty css                    */import"./vue-router-4dc5009b.js";import"./axios-4a70c6fc.js";import"./prismjs-f5ad2561.js";import"./highlight.js-d90016de.js";import"./vee-validate-30786abe.js";import"./@vee-validate-f9e0ad5b.js";import"./yup-752d7be0.js";import"./property-expr-38205fa5.js";import"./toposort-39c4f588.js";const D={class:"flex items-center gap-1"},J={class:"-mt-5"},K={class:"flex justify-start gap-2 h-12"},G={class:"flex flex-col justify-between"},I={class:"text-xs"},M={class:""},O=C({__name:"question-rank-total",async setup(E){let a,m;const{getQuestionRankTotal:h}=j(),x=([a,m]=z(()=>h()),a=await a,m(),a);return(v,H)=>{const p=F,y=$,u=L("router-link"),d=w;return _(),B(d,null,{header:o(()=>[e("div",D,[t(p,{theme:"filled",size:"20",fill:"#333"}),s(" 本周总分前10名 ")])]),default:o(()=>[e("section",J,[(_(!0),b(N,null,V(c(x),i=>{var r,f;return _(),b("div",{class:"border-b py-3 flex items-center justify-between",key:i.id},[e("div",K,[t(y,{user:i.user},null,8,["user"]),e("div",G,[t(u,{to:{name:"sign.space",query:{uid:(r=i.user)==null?void 0:r.id}}},{default:o(()=>{var g;return[s(l((g=i.user)==null?void 0:g.nickname),1)]}),_:2},1032,["to"]),e("span",I,"注册于 "+l(c(k)((f=i.user)==null?void 0:f.created_at).fromNow()),1)])]),e("div",M,l(i.total)+" 分",1)])}),128))])]),_:1})}}}),P={class:"lg:grid grid-cols-12 gap-5"},W={class:"col-span-9 mb-5"},X=e("section",{class:"flex justify-between items-end"},"每日一考",-1),Y=e("div",{class:"leading-7"},[e("span",{class:"font-bold"},"考试说明:"),s(),e("br"),s(" 每天只能考试一次，进入考场即生成记录"),e("br"),s(" 考试时间20分钟，可以提前交卷 "),e("br"),s(" 退出考场后，20分钟内可以再进入考场"),e("br"),s(" 祝你成为今天第一名 ")],-1),Z={class:"flex items-center gap-2 bg-gray-50 mt-3 p-3 border border-gray-200 rounded-md"},ee={class:"flex justify-between items-end"},te={class:"flex items-center gap-2 text-sm"},se={key:0,class:"flex items-center justify-center"},oe={class:"flex justify-start gap-2 items-center"},ne={class:"col-span-3"},ae=e("section",null,[s(" 任何人的知识都是金贵的，你出的题一定有适合和喜欢的人群。 所以放心大胆的出题吧。 "),e("br"),s(" 网站所有题来源于网友朋友，你出的每一道题，都会帮助到努力前进的少年。 ")],-1),Re=C({__name:"index",async setup(E){let a,m;const{open:h}=S(),{getRankingList:x}=j(),v=([a,m]=z(()=>x()),a=await a,m(),a);return(H,p)=>{const y=T,u=Q,d=w,i=R,r=q,f=L("router-link"),g=A;return _(),B(U,null,{default:o(()=>[e("main",P,[e("section",W,[t(d,{class:""},{header:o(()=>[X]),default:o(()=>[Y,t(y,{type:"primary",size:"large",onClick:p[0]||(p[0]=n=>c(h)({name:"question.answer.index"})),class:"mt-3"},{default:o(()=>[s(" 进入考场 ")]),_:1}),e("div",Z,[t(u,{theme:"outline",size:"24",fill:"#333"}),s(" 功能测试期，测试完毕后会给成绩优秀的朋友送个小礼品，对你认真学习的态度，以示鼓励 ")])]),_:1}),t(d,{class:"mb-5 mt-5"},{header:o(()=>[e("section",ee,[s(" 今日成绩榜单 "),e("div",te,[t(u,{theme:"outline",size:"18",fill:"#333"}),s(" 相同分数的成绩，用时少的排名靠前 ")])])]),default:o(()=>[t(g,{data:c(v),border:"",stripe:"",size:"large","header-cell-class-name":"text-base","cell-class-name":"text-base py-4 text-center text-gray-600 ",class:"hidden md:flex"},{default:o(()=>[t(r,{label:"排名",align:"center",width:"150"},{default:o(({$index:n})=>[n==0?(_(),b("div",se,[t(i,{theme:"outline",size:"35",fill:"#e67e22"})])):(_(),b(N,{key:1},[s("第"+l(n+1)+"名",1)],64))]),_:1}),t(r,{label:"同学",align:"left"},{default:o(({row:n})=>[e("div",oe,[t($,{user:n.user},null,8,["user"]),t(f,{to:{name:"sign.space",params:{uid:n.user.id}}},{default:o(()=>[s(l(n.user.nickname),1)]),_:2},1032,["to"])])]),_:1}),t(r,{label:"成绩",align:"center"},{default:o(({row:n})=>[s(l(n.mark)+" 分 ",1)]),_:1}),t(r,{label:"考试时间",align:"center"},{default:o(({row:n})=>[s(l(c(k)(n.created_at).format("HH:mm")),1)]),_:1}),t(r,{label:"用时",align:"center"},{default:o(({row:n})=>[s(l(c(k)(n.updated_at).diff(n.created_at,"minute"))+"分钟 ",1)]),_:1})]),_:1},8,["data"])]),_:1})]),e("section",ne,[t(d,{class:""},{header:o(()=>[s("出个题吧")]),default:o(()=>[ae]),_:1}),t(O,{class:"mt-5"})])])]),_:1})}}});export{Re as default};
