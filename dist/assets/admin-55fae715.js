import{_ as k}from"./card-5e9a267c.js";import{k as C}from"./element-plus-269c9c95.js";import{_ as $}from"./system-item.vue_vue_type_script_setup_true_lang-e9a8523f.js";import{d as V}from"./vuedraggable-be75e328.js";import{u as B}from"./vue-router-4dc5009b.js";import{u as b}from"./useSystem-924e1e37.js";import{F as x,r as j,bF as w,o as d,J as N,K as r,a as f,b as i,Q as a,u as e,c as q,P as z,B as E}from"./@vue-fc98776d.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./lodash-es-d29772ce.js";import"./async-validator-dee29e8b.js";import"./@vueuse-338b0492.js";import"./@element-plus-828baf85.js";import"./dayjs-2fa04b10.js";import"./@kangc-b0092abd.js";import"./vue-d4d0ec31.js";import"./@sxzz-c75af06c.js";import"./escape-html-9595eff5.js";import"./normalize-wheel-es-ed76fb12.js";import"./@ctrl-f8748455.js";import"./index-28f279b5.js";import"./pinia-883c818f.js";import"./vue-demi-71ba0ef2.js";/* empty css                    */import"./@icon-park-3742eccb.js";import"./axios-4a70c6fc.js";import"./prismjs-f5ad2561.js";import"./highlight.js-d90016de.js";import"./vee-validate-30786abe.js";import"./@vee-validate-f9e0ad5b.js";import"./yup-752d7be0.js";import"./property-expr-38205fa5.js";import"./toposort-39c4f588.js";import"./sortablejs-c04ee0f2.js";import"./qs-9ebea5eb.js";import"./side-channel-d24dcd95.js";import"./get-intrinsic-bd2830fd.js";import"./has-symbols-e8f3ca0e.js";import"./has-proto-f7d0b240.js";import"./function-bind-22e7ee79.js";import"./has-26d28e02.js";import"./call-bind-e5c1c8b0.js";import"./object-inspect-acc106ce.js";const A={class:"flex justify-between items-center"},D={key:0,class:"text-center p-3"},Bt=x({__name:"admin",async setup(F){let l,u;const y=B(),{collection:m,findAll:c,order:_,remove:g}=b(),p=j(y.query.type||"project");return[l,u]=w(()=>c(1,{type:p.value})),await l,u(),(s,t)=>{const n=C,v=k;return d(),N(v,null,{header:r(()=>[f("div",A,[f("div",null,[i(n,{type:e(p)=="system"?"primary":"info",size:"default",onClick:t[0]||(t[0]=o=>s.$router.push({name:"admin.system",query:{type:"system"}}))},{default:r(()=>[a(" 系统课程 ")]),_:1},8,["type"]),i(n,{type:e(p)=="project"?"primary":"info",size:"default",onClick:t[1]||(t[1]=o=>s.$router.push({name:"admin.system",query:{type:"project"}}))},{default:r(()=>[a(" 实战项目 ")]),_:1},8,["type"])]),i(n,{type:"success",size:"default",onClick:t[2]||(t[2]=o=>s.$router.push({name:"system.create"}))},{default:r(()=>[a(" 添加课程 ")]),_:1})])]),default:r(()=>[e(m).length?z("",!0):(d(),q("div",D,"暂无课程")),i(e(V),{modelValue:e(m),"onUpdate:modelValue":t[3]||(t[3]=o=>E(m)?m.value=o:null),group:"people",onEnd:t[4]||(t[4]=o=>e(_)(e(m))),"item-key":"id",class:"grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-5 gap-3"},{item:r(({element:o})=>[i($,{item:o,onDel:e(g)},{footer:r(()=>[]),_:2},1032,["item","onDel"])]),_:1},8,["modelValue"])]),_:1})}}});export{Bt as default};
