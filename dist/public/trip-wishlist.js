(()=>{var t={8726:(t,e,s)=>{"use strict";function a(){}s.d(e,{A:()=>i}),a.hasClass=function(t,e){return t.classList?t.classList.contains(e):!!t.getAttribute("class").match(new RegExp("(\\s|^)"+e+"(\\s|$)"))},a.addClass=function(t,e){var s=e.split(" ");t.classList?t.classList.add(s[0]):a.hasClass(t,s[0])||t.setAttribute("class",t.getAttribute("class")+" "+s[0]),s.length>1&&a.addClass(t,s.slice(1).join(" "))},a.removeClass=function(t,e){var s=e.split(" ");if(t.classList)t.classList.remove(s[0]);else if(a.hasClass(t,s[0])){var i=new RegExp("(\\s|^)"+s[0]+"(\\s|$)");t.setAttribute("class",t.getAttribute("class").replace(i," "))}s.length>1&&a.removeClass(t,s.slice(1).join(" "))},a.toggleClass=function(t,e,s){s?a.addClass(t,e):a.removeClass(t,e)},a.setAttributes=function(t,e){for(var s in e)t?.setAttribute&&t.setAttribute(s,e[s])},a.getChildrenByClassName=function(t,e){t.children;for(var s=[],i=0;i<t.children.length;i++)a.hasClass(t.children[i],e)&&s.push(t.children[i]);return s},a.getIndexInArray=function(t,e){return Array.prototype.indexOf.call(t,e)},a.on=function(t,e,s){document.addEventListener(t,(function(t){for(var a=t.target;a&&a!=this;a=a.parentNode)if(a.matches(e)){s.call(a,t);break}}),!1)};const i=a},5745:(t,e,s)=>{"use strict";s.r(e),s.d(e,{default:()=>i});var a=s(8726);const i=()=>{document.addEventListener("DOMContentLoaded",(()=>{if(window.localStorage&&window.localStorage.getItem("wptravelengine_wishlists")){const t=JSON.parse(window.localStorage.getItem("wptravelengine_wishlists"));t?.map((t=>{document.querySelector(`[data-product="${t}"]`)?.classList.add("active")}))}})),a.A.on("click",".wishlist-toggle",(async function(t){const e=this;t.preventDefault();const s=e.classList.contains("active");let a=s?"DELETE":"POST";!s&&e.setAttribute("title","Already in wishlist"),s&&e.setAttribute("title","Add to wishlist");let i=e.dataset.product;e.classList.contains("wte-wishlist-remove-all")&&(i="all",a="DELETE");const r=await fetch(`${wteL10n.wpxhr.root}?action=wte_user_wishlist&wishlist=${i}&_nonce=${wteL10n.wpxhr.nonce}`,{method:a}),n=await r.json();if(n.success){if(window.localStorage&&window.localStorage.setItem("wptravelengine_wishlists",JSON.stringify(n.data.user_wishlists)),n.data.refresh)return void window.location.reload();this.classList.toggle("active",!s);const t=this.closest(".category-trips-single");t.closest("[data-wptravelengine-wishlists]")&&t.remove(),n?.data?.partials&&Object.entries(n.data.partials).forEach((([t,e])=>{let s=document.querySelector(t);s&&(s.innerHTML=e)}))}}))}},7334:(t,e,s)=>{document.querySelector(".wishlist-toggle")&&s(5745).default()}},e={};function s(a){var i=e[a];if(void 0!==i)return i.exports;var r=e[a]={exports:{}};return t[a](r,r.exports,s),r.exports}s.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return s.d(e,{a:e}),e},s.d=(t,e)=>{for(var a in e)s.o(e,a)&&!s.o(t,a)&&Object.defineProperty(t,a,{enumerable:!0,get:e[a]})},s.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),s.r=t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},(()=>{"use strict";s(7334)})()})();