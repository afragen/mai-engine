parcelRequire=function(e,r,t,n){var i,o="function"==typeof parcelRequire&&parcelRequire,u="function"==typeof require&&require;function f(t,n){if(!r[t]){if(!e[t]){var i="function"==typeof parcelRequire&&parcelRequire;if(!n&&i)return i(t,!0);if(o)return o(t,!0);if(u&&"string"==typeof t)return u(t);var c=new Error("Cannot find module '"+t+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[t][1][r]||r},p.cache={};var l=r[t]=new f.Module(t);e[t][0].call(l.exports,p,l,l.exports,this)}return r[t].exports;function p(e){return f(p.resolve(e))}}f.isParcelRequire=!0,f.Module=function(e){this.id=e,this.bundle=f,this.exports={}},f.modules=e,f.cache=r,f.parent=o,f.register=function(r,t){e[r]=[function(e,r){r.exports=t},{}]};for(var c=0;c<t.length;c++)try{f(t[c])}catch(e){i||(i=e)}if(t.length){var l=f(t[t.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=l:"function"==typeof define&&define.amd?define(function(){return l}):n&&(this[n]=l)}if(parcelRequire=f,i)throw i;return f}({"PF6Q":[function(require,module,exports) {
var n=9007199254740991,r="[object Arguments]",t="[object Function]",e="[object GeneratorFunction]",u=/^(?:0|[1-9]\d*)$/;function o(n,r,t){switch(t.length){case 0:return n.call(r);case 1:return n.call(r,t[0]);case 2:return n.call(r,t[0],t[1]);case 3:return n.call(r,t[0],t[1],t[2])}return n.apply(r,t)}function c(n,r){for(var t=-1,e=Array(n);++t<n;)e[t]=r(t);return e}function a(n,r){return function(t){return n(r(t))}}var i=Object.prototype,l=i.hasOwnProperty,f=i.toString,v=i.propertyIsEnumerable,p=a(Object.keys,Object),s=Math.max,y=!v.call({valueOf:1},"valueOf");function h(n,r){var t=S(n)||F(n)?c(n.length,String):[],e=t.length,u=!!e;for(var o in n)!r&&!l.call(n,o)||u&&("length"==o||m(o,e))||t.push(o);return t}function g(n,r,t){var e=n[r];l.call(n,r)&&x(e,t)&&(void 0!==t||r in n)||(n[r]=t)}function b(n){if(!w(n))return p(n);var r=[];for(var t in Object(n))l.call(n,t)&&"constructor"!=t&&r.push(t);return r}function d(n,r){return r=s(void 0===r?n.length-1:r,0),function(){for(var t=arguments,e=-1,u=s(t.length-r,0),c=Array(u);++e<u;)c[e]=t[r+e];e=-1;for(var a=Array(r+1);++e<r;)a[e]=t[e];return a[r]=c,o(n,this,a)}}function j(n,r,t,e){t||(t={});for(var u=-1,o=r.length;++u<o;){var c=r[u],a=e?e(t[c],n[c],c,t,n):void 0;g(t,c,void 0===a?n[c]:a)}return t}function O(n){return d(function(r,t){var e=-1,u=t.length,o=u>1?t[u-1]:void 0,c=u>2?t[2]:void 0;for(o=n.length>3&&"function"==typeof o?(u--,o):void 0,c&&A(t[0],t[1],c)&&(o=u<3?void 0:o,u=1),r=Object(r);++e<u;){var a=t[e];a&&n(r,a,e,o)}return r})}function m(r,t){return!!(t=null==t?n:t)&&("number"==typeof r||u.test(r))&&r>-1&&r%1==0&&r<t}function A(n,r,t){if(!M(t))return!1;var e=typeof r;return!!("number"==e?k(t)&&m(r,t.length):"string"==e&&r in t)&&x(t[r],n)}function w(n){var r=n&&n.constructor;return n===("function"==typeof r&&r.prototype||i)}function x(n,r){return n===r||n!=n&&r!=r}function F(n){return E(n)&&l.call(n,"callee")&&(!v.call(n,"callee")||f.call(n)==r)}var S=Array.isArray;function k(n){return null!=n&&I(n.length)&&!G(n)}function E(n){return P(n)&&k(n)}function G(n){var r=M(n)?f.call(n):"";return r==t||r==e}function I(r){return"number"==typeof r&&r>-1&&r%1==0&&r<=n}function M(n){var r=typeof n;return!!n&&("object"==r||"function"==r)}function P(n){return!!n&&"object"==typeof n}var $=O(function(n,r){if(y||w(r)||k(r))j(r,q(r),n);else for(var t in r)l.call(r,t)&&g(n,t,r[t])});function q(n){return k(n)?h(n):b(n)}module.exports=$;
},{}],"oSdA":[function(require,module,exports) {
"use strict";var e=a(require("lodash.assign")),t=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var i in a)Object.prototype.hasOwnProperty.call(a,i)&&(e[i]=a[i])}return e};function a(e){return e&&e.__esModule?e:{default:e}}var i=wp.i18n.__,n=wp.compose.createHigherOrderComponent,l=wp.element.Fragment,c=wp.blockEditor.InspectorControls,r=wp.hooks.addFilter,u=wp.components,m=u.PanelBody,s=u.BaseControl,o=u.ButtonGroup,d=u.Button,v=["core/cover","core/group"],g=["core/heading","core/paragraph"],p=["core/heading","core/paragraph","core/separator"],b=function(t,a){return v.includes(a)&&(t.attributes=(0,e.default)(t.attributes,{contentWidth:{type:"string",default:""},verticalSpacingTop:{type:"string",default:""},verticalSpacingBottom:{type:"string",default:""},verticalSpacingLeft:{type:"string",default:""},verticalSpacingRight:{type:"string",default:""}})),g.includes(a)&&(t.attributes=(0,e.default)(t.attributes,{maxWidth:{type:"string",default:""}})),p.includes(a)&&(t.attributes=(0,e.default)(t.attributes,{spacingTop:{type:"string",default:""},spacingBottom:{type:"string",default:""}})),t};r("blocks.registerBlockType","mai-engine/attribute/layout-settings",b);var R=n(function(e){return function(t){if(v.includes(t.name)){var a=[{label:i("XS","mai-engine"),value:"xs"},{label:i("S","mai-engine"),value:"sm"},{label:i("M","mai-engine"),value:"md"},{label:i("L","mai-engine"),value:"lg"},{label:i("XL","mai-engine"),value:"xl"}],n=t.attributes,r=n.contentWidth,u=n.verticalSpacingTop,g=n.verticalSpacingBottom,p=n.verticalSpacingLeft,b=n.verticalSpacingRight;return React.createElement(l,null,React.createElement(e,t),React.createElement(c,null,React.createElement(m,{title:i("Content Width","mai-engine"),initialOpen:!1,className:"mai-content-width-settings"},React.createElement(s,{id:"mai-content-width",label:i("Max Width","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":r},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({contentWidth:e.value})},"data-checked":r===e.value,value:e.value,key:"mai-content-width-".concat(e.value),index:e.value,isSecondary:r!==e.value,isPrimary:r===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({contentWidth:null})}},i("Clear","mai-engine"))))),React.createElement(m,{title:i("Spacing","mai-engine"),initialOpen:!1,className:"mai-spacing-settings"},React.createElement(s,{id:"mai-vertical-spacing-top",label:i("Top","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":u},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({verticalSpacingTop:e.value})},"data-checked":u===e.value,value:e.value,key:"mai-vertical-space-top-".concat(e.value),index:e.value,isSecondary:u!==e.value,isPrimary:u===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({verticalSpacingTop:null})}},i("Clear","mai-engine")))),React.createElement(s,{id:"mai-vertical-spacing-bottom",label:i("Bottom","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":g},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({verticalSpacingBottom:e.value})},"data-checked":g===e.value,value:e.value,key:"mai-vertical-space-bottom-".concat(e.value),index:e.value,isSecondary:g!==e.value,isPrimary:g===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({verticalSpacingBottom:null})}},i("Clear","mai-engine")))),React.createElement(s,{id:"mai-vertical-spacing-left",label:i("Left","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":p},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({verticalSpacingLeft:e.value})},"data-checked":p===e.value,value:e.value,key:"mai-vertical-space-left-".concat(e.value),index:e.value,isSecondary:p!==e.value,isPrimary:p===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({verticalSpacingLeft:null})}},i("Clear","mai-engine")))),React.createElement(s,{id:"mai-vertical-spacing-right",label:i("Right","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":b},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({verticalSpacingRight:e.value})},"data-checked":b===e.value,value:e.value,key:"mai-vertical-space-right-".concat(e.value),index:e.value,isSecondary:b!==e.value,isPrimary:b===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({verticalSpacingRight:null})}},i("Clear","mai-engine")))))))}return React.createElement(e,t)}},"withLayoutControls");r("editor.BlockEdit","mai-engine/with-layout-settings",R);var E=n(function(e){return function(t){if(g.includes(t.name)){var a=[{label:i("XS","mai-engine"),value:"xs"},{label:i("S","mai-engine"),value:"sm"},{label:i("M","mai-engine"),value:"md"},{label:i("L","mai-engine"),value:"lg"},{label:i("XL","mai-engine"),value:"xl"}],n=t.attributes.maxWidth;return React.createElement(l,null,React.createElement(e,t),React.createElement(c,null,React.createElement(m,{title:i("Width","mai-engine"),initialOpen:!1,className:"mai-width-settings"},React.createElement(s,{id:"mai-width",label:i("Max Width","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":n},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({maxWidth:e.value})},"data-checked":n===e.value,value:e.value,key:"mai-width-".concat(e.value),index:e.value,isSecondary:n!==e.value,isPrimary:n===e.value},React.createElement("small",null,e.label))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({maxWidth:null})}},i("Clear","mai-engine")))))))}return React.createElement(e,t)}},"withMaxWidthControls");r("editor.BlockEdit","mai-engine/with-max-width-settings",E);var h=n(function(e){return function(t){if(p.includes(t.name)){var a=[{label:i("XXS","mai-engine"),value:"sm"},{label:i("XS","mai-engine"),value:"md"},{label:i("S","mai-engine"),value:"lg"},{label:i("M","mai-engine"),value:"xl"},{label:i("L","mai-engine"),value:"xxl"},{label:i("XL","mai-engine"),value:"xxxl"},{label:i("XXL","mai-engine"),value:"xxxxl"}],n=t.attributes,r=n.spacingTop,u=n.spacingBottom;return React.createElement(l,null,React.createElement(e,t),React.createElement(c,null,React.createElement(m,{title:i("Spacing","mai-engine"),initialOpen:!1,className:"mai-spacing-settings"},React.createElement(s,{id:"mai-spacing-top",label:i("Top","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":r},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({spacingTop:e.value})},"data-checked":r===e.value,value:e.value,key:"mai-space-top-".concat(e.value),index:e.value,isSecondary:r!==e.value,isPrimary:r===e.value},React.createElement("small",null,React.createElement("small",null,e.label)))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({spacingTop:null})}},i("Clear","mai-engine")))),React.createElement(s,{id:"mai-spacing-bottom",label:i("Bottom","mai-engine")},React.createElement("div",null,React.createElement(o,{mode:"radio","data-chosen":u},a.map(function(e){return React.createElement(d,{onClick:function(){t.setAttributes({spacingBottom:e.value})},"data-checked":u===e.value,value:e.value,key:"mai-space-top-".concat(e.value),index:e.value,isSecondary:u!==e.value,isPrimary:u===e.value},React.createElement("small",null,React.createElement("small",null,e.label)))})),React.createElement(d,{isDestructive:!0,isSmall:!0,isLink:!0,onClick:function(){t.setAttributes({spacingBottom:null})}},i("Clear","mai-engine")))))))}return React.createElement(e,t)}},"withSpacingControls");r("editor.BlockEdit","mai-engine/with-spacing-settings",h);var f=n(function(e){return function(a){var i={};return v.includes(a.name)&&(i["data-content-width"]=a.attributes.contentWidth,i["data-spacing-top"]=a.attributes.verticalSpacingTop,i["data-spacing-bottom"]=a.attributes.verticalSpacingBottom,i["data-spacing-left"]=a.attributes.verticalSpacingLeft,i["data-spacing-right"]=a.attributes.verticalSpacingRight),g.includes(a.name)&&(i["data-max-width"]=a.attributes.maxWidth),p.includes(a.name)&&(i["data-spacing-top"]=a.attributes.spacingTop,i["data-spacing-bottom"]=a.attributes.spacingBottom),i?React.createElement(e,t({},a,{wrapperProps:i})):React.createElement(e,a)}},"addCustomAttributes");r("editor.BlockListBlock","mai-engine/add-custom-attributes",f);
},{"lodash.assign":"PF6Q"}],"X1ux":[function(require,module,exports) {
"use strict";require("./layout-settings");
},{"./layout-settings":"oSdA"}]},{},["X1ux"], null)
//# sourceMappingURL=/blocks.js.map