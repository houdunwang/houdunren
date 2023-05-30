/**
  * vee-validate v4.9.5
  * (c) 2023 Abdelrahman Awad
  * @license MIT
  */function a(e){return typeof e=="function"}function s(e,n){i(e,n)}function i(e,n){if(!a(n))throw new Error(`Extension Error: The validator '${e}' must be a function.`)}const r={generateMessage:({field:e})=>`${e} is not valid.`,bails:!0,validateOnBlur:!0,validateOnChange:!0,validateOnInput:!1,validateOnModelUpdate:!0};let t=Object.assign({},r);const o=e=>{t=Object.assign(Object.assign({},t),e)},u=o;export{u as c,s as d};
