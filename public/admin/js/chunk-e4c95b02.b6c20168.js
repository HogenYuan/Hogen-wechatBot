(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-e4c95b02"],{"03662":function(t,e,a){"use strict";var i=a("3e60"),n=a.n(i);n.a},3835:function(t,e,a){"use strict";function i(t){if(Array.isArray(t))return t}a.d(e,"a",(function(){return s}));a("a4d3"),a("e01a"),a("d28b"),a("e260"),a("d3b7"),a("3ca3"),a("ddb0");function n(t,e){if("undefined"!==typeof Symbol&&Symbol.iterator in Object(t)){var a=[],i=!0,n=!1,r=void 0;try{for(var o,s=t[Symbol.iterator]();!(i=(o=s.next()).done);i=!0)if(a.push(o.value),e&&a.length===e)break}catch(l){n=!0,r=l}finally{try{i||null==s["return"]||s["return"]()}finally{if(n)throw r}}return a}}var r=a("06c5");function o(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function s(t,e){return i(t)||n(t,e)||Object(r["a"])(t,e)||o()}},"3e60":function(t,e,a){},"441c":function(t,e,a){"use strict";a("4160"),a("c975"),a("d81d"),a("fb6a"),a("ac1f"),a("1276"),a("498a"),a("159b");var i,n,r=a("2638"),o=a.n(r),s=a("53ca"),l=a("3835"),u=a("5530"),c=a("e572"),p=a("6d97"),f=a("b047"),m=a.n(f),d={name:"TypeInput",components:{FilePicker:p["a"]},data:function(){return{filePickerKey:1}},props:{type:String,value:null,options:Object},computed:Object(u["a"])({},Object(c["f"])(["CONFIG_TYPES"]),{selectOptions:function(){if(this.type!==this.CONFIG_TYPES.SINGLE_SELECT&&this.type!==this.CONFIG_TYPES.MULTIPLE_SELECT)return[];var t=this.options.options.split("\n"),e=[];return t.forEach((function(t){var a=t.split("=>").map((function(t){return t.trim()})),i=Object(l["a"])(a,2),n=i[0],r=i[1];r&&e.push({value:n,label:r})})),e}}),methods:{onInput:function(t){this.$emit("input",t)},initValue:function(){this.type===this.CONFIG_TYPES.FILE?this.options.max>1&&!Array.isArray(this.value)?this.onInput(this.value?[this.value]:[]):this.options.max<=1&&Array.isArray(this.value)&&this.onInput(this.value[0]||null):this.type===this.CONFIG_TYPES.MULTIPLE_SELECT?!Array.isArray(this.value)&&this.onInput([]):-1===["string","boolean","number"].indexOf(Object(s["a"])(this.value))&&this.onInput(null)},updateFilePicker:m()((function(){this.filePickerKey++}),500)},watch:{type:{handler:function(){this.initValue()},immediate:!0},"options.max":function(t,e){t>1&&e>1||this.updateFilePicker(),this.initValue(),t>1&&t<e&&this.onInput(this.value.slice(0,t))},"options.ext":function(){this.updateFilePicker()}},render:function(t){var e,a={attrs:{value:this.value},on:{}},i=null,n=null,r=this.CONFIG_TYPES;switch(this.type){case r.INPUT:case r.OTHER:i="a-input",e="change.value";break;case r.TEXTAREA:i="a-input",e="change.value",a.attrs.type="textarea";break;case r.FILE:i="file-picker",e="input",Object.assign(a.attrs,{max:this.options.max,ext:this.options.ext,multiple:this.options.max>1}),a.key=this.filePickerKey;break;case r.SINGLE_SELECT:case r.MULTIPLE_SELECT:var s=this.type===r.MULTIPLE_SELECT;if("input"===this.options.type){i=s?"a-checkbox-group":"a-radio-group",e="input";var l=s?"a-checkbox":"a-radio";n=this.selectOptions.map((function(e){return t(l,{key:e.value,attrs:{value:e.value}},[e.label])}))}else"select"===this.options.type&&(i="a-select",e="change",Object.assign(a.attrs,{mode:s?"multiple":"default",allowClear:s}),n=this.selectOptions.map((function(e){return t("a-select-option",{key:e.value,attrs:{value:e.value}},[e.label])})));break;default:}return a.on[e]=this.onInput,t(i,o()([{},a]),[n])}},h=d,v=a("2877"),b=Object(v["a"])(h,i,n,!1,null,null,null);e["a"]=b.exports},"498a":function(t,e,a){"use strict";var i=a("23e7"),n=a("58a8").trim,r=a("c8d2");i({target:"String",proto:!0,forced:r("trim")},{trim:function(){return n(this)}})},"5d56":function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("page-content",{attrs:{center:""}},[a("lz-form",{attrs:{"get-data":t.getData,submit:t.onSubmit,form:t.form,errors:t.errors},on:{"update:form":function(e){t.form=e},"update:errors":function(e){t.errors=e}}},[a("lz-form-item",{attrs:{label:"类型",prop:"type",required:""}},[a("a-radio-group",{model:{value:t.form.type,callback:function(e){t.$set(t.form,"type",e)},expression:"form.type"}},t._l(t.types,(function(e){return a("a-radio",{key:e.value,attrs:{value:e.value}},[t._v(" "+t._s(e.label)+" ")])})),1)],1),a("lz-form-item",{attrs:{label:"分类",prop:"category_id",required:""}},[a("a-select",{attrs:{"option-filter-prop":"name","show-search":""},model:{value:t.form.category_id,callback:function(e){t.$set(t.form,"category_id",e)},expression:"form.category_id"}},t._l(t.cates,(function(e){return a("a-select-option",{key:e.id,attrs:{name:e.name}},[t._v(" "+t._s(e.name)+" ")])})),1)],1),a("lz-form-item",{attrs:{label:"名称",prop:"name",required:""}},[a("a-input",{model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),a("lz-form-item",{attrs:{label:"标识",prop:"slug",required:""}},[a("a-input",{model:{value:t.form.slug,callback:function(e){t.$set(t.form,"slug",e)},expression:"form.slug"}})],1),a("lz-form-item",{attrs:{label:"简介",prop:"desc"}},[a("a-input",{attrs:{type:"textarea"},model:{value:t.form.desc,callback:function(e){t.$set(t.form,"desc",e)},expression:"form.desc"}})],1),a("lz-form-item",{attrs:{label:"选项",prop:"options"}},[a("type-options",{attrs:{type:t.form.type},model:{value:t.form.options,callback:function(e){t.$set(t.form,"options",e)},expression:"form.options"}})],1),a("lz-form-item",{attrs:{label:"值",prop:"value"}},[a("type-input",{attrs:{type:t.form.type,options:t.form.options},model:{value:t.form.value,callback:function(e){t.$set(t.form,"value",e)},expression:"form.value"}})],1),a("lz-form-item",{attrs:{label:"验证规则",prop:"validation_rules"}},[a("a-input",{model:{value:t.form.validation_rules,callback:function(e){t.$set(t.form,"validation_rules",e)},expression:"form.validation_rules"}})],1)],1)],1)},n=[],r=(a("96cf"),a("1da1")),o=a("04bc"),s=a("4d2d"),l=a("9948"),u=a.n(l),c=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("a-form",[t.type===this.CONFIG_TYPES.FILE?[a("a-form-item",{attrs:{label:"最大上传数"}},[a("a-input-number",{attrs:{min:1,max:99},model:{value:t.value.max,callback:function(e){t.$set(t.value,"max",e)},expression:"value.max"}})],1),a("a-form-item",{attrs:{label:"文件类型"}},[a("a-input",{attrs:{placeholder:"多个之间用英文逗号隔开"},model:{value:t.value.ext,callback:function(e){t.$set(t.value,"ext",e)},expression:"value.ext"}})],1)]:t.type===this.CONFIG_TYPES.SINGLE_SELECT||t.type===this.CONFIG_TYPES.MULTIPLE_SELECT?[a("a-form-item",{attrs:{label:"选项设置"}},[a("a-input",{attrs:{type:"textarea",rows:"4",placeholder:"配置示例：\n值1=>文字1\n值2=>文字2"},model:{value:t.value.options,callback:function(e){t.$set(t.value,"options",e)},expression:"value.options"}})],1),a("a-form-item",{attrs:{label:"选择形式"}},[a("a-radio-group",{model:{value:t.value.type,callback:function(e){t.$set(t.value,"type",e)},expression:"value.type"}},[a("a-radio",{attrs:{value:"input",label:"input"}},[t._v("单选/复选")]),a("a-radio",{attrs:{value:"select",label:"select"}},[t._v("下拉选择")])],1)],1)]:[a("a-form-item",{staticClass:"ma-0"},[t._v("无")])]],2)},p=[],f=(a("b64b"),a("5530")),m=a("e572"),d=a("2593"),h=a.n(d),v={name:"TypeOptions",model:{prop:"value",event:"change.value"},props:{type:String,value:Object},computed:Object(f["a"])({},Object(m["f"])(["CONFIG_TYPES"])),created:function(){this.optionsBak={},this.$on("field-reset",this.onReset)},beforeDestroy:function(){this.$off("field-reset",this.onReset)},methods:{onReset:function(){this.optionsBak={},this.initOptions()},initOptions:function(){var t=this.type;if(t){var e;switch(t){case this.CONFIG_TYPES.FILE:e={max:1,ext:""};break;case this.CONFIG_TYPES.SINGLE_SELECT:case this.CONFIG_TYPES.MULTIPLE_SELECT:e={options:"",type:"input"};break;default:e=null}var a=e?h()(Object.assign({},this.optionsBak[t]||e,this.value),Object.keys(e)):null;this.optionsBak[t]=a,this.$emit("change.value",a)}}},watch:{type:{handler:function(){this.initOptions()},immediate:!0},$route:function(){this.optionsBak={}}}},b=v,y=(a("c358"),a("2877")),k=Object(y["a"])(b,c,p,!1,null,"551e4adb",null),x=k.exports,g=a("441c"),E=a("90fe"),_=a("33c7"),I=a("d99d"),O={name:"Form",components:{LzFormItem:I["a"],PageContent:_["a"],TypeInput:g["a"],TypeOptions:x,LzForm:o["a"]},data:function(){return{form:{type:"",category_id:"",name:"",slug:"",desc:"",options:{},value:"",validation_rules:""},errors:{},types:[],cates:[]}},methods:{getData:function(t){var e=this;return Object(r["a"])(regeneratorRuntime.mark((function a(){var i,n,r,o;return regeneratorRuntime.wrap((function(a){while(1)switch(a.prev=a.next){case 0:if(!t.realEditMode){a.next=7;break}return a.next=3,Object(s["e"])(t.resourceId);case 3:n=a.sent,i=n.data,a.next=11;break;case 7:return a.next=9,Object(s["b"])();case 9:r=a.sent,i=r.data;case 11:return e.cates=i.categories,o=[],u()(i.types_map,(function(t,e){o.push({value:e,label:t})})),e.types=o,e.form.type=o[0].value,!e.editMode&&(e.form.category_id=Object(E["x"])(e.$route.query.category_id,"")),a.abrupt("return",i.data);case 18:case"end":return a.stop()}}),a)})))()},onSubmit:function(t){var e=this;return Object(r["a"])(regeneratorRuntime.mark((function a(){return regeneratorRuntime.wrap((function(a){while(1)switch(a.prev=a.next){case 0:if(!t.realEditMode){a.next=5;break}return a.next=3,Object(s["n"])(t.resourceId,e.form);case 3:a.next=7;break;case 5:return a.next=7,Object(s["l"])(e.form);case 7:case"end":return a.stop()}}),a)})))()}}},S=O,P=Object(y["a"])(S,i,n,!1,null,null,null);e["default"]=P.exports},"6d97":function(t,e,a){"use strict";var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"file-picker"},[a("div",{staticClass:"file-wrapper"},[t._l(t.arrayValue,(function(e,i){return a("file-preview",{key:i,staticClass:"preview file-item",attrs:{file:e}},[a("a-icon",{staticClass:"replace",attrs:{type:"sync",title:"替换"},on:{click:function(e){return e.stopPropagation(),t.onReplace(i)}}}),a("lz-popconfirm",{attrs:{title:"确认移除？",confirm:function(){return t.remove(i)}}},[a("a-icon",{staticClass:"remove",attrs:{type:"delete",title:"移除"}})],1)],1)})),a("div",{directives:[{name:"show",rawName:"v-show",value:!t.isMax,expression:"!isMax"}],staticClass:"picker file-item flex-box",on:{click:t.onPick}},[a("svg-icon",{staticClass:"file-icon",attrs:{"icon-class":t.pickerIcon}})],1)],2),a("a-modal",{attrs:{title:t.title,width:"90%",footer:null,"wrap-class-name":"system-media-dialog"},model:{value:t.dialog,callback:function(e){t.dialog=e},expression:"dialog"}},[a("system-media",{ref:"media",attrs:{"default-multiple":t.mediaMultiple,"default-ext":t.ext},scopedSlots:t._u([{key:"actions",fn:function(e){return[a("a-button",{attrs:{type:"primary",disabled:!e.anySelected},on:{click:function(a){return t.onPickConfirm(e.selected)}}},[t._v(" 选定 ")])]}}])})],1)],1)},n=[],r=(a("99af"),a("d81d"),a("fb6a"),a("a434"),a("a9e3"),a("d3b7"),a("ac1f"),a("6062"),a("3ca3"),a("1276"),a("ddb0"),a("2909")),o=a("5530"),s=a("8a59"),l=a("2847"),u=a("2593"),c=a.n(u),p=a("1028"),f={name:"FilePicker",components:{LzPopconfirm:p["a"],FilePreview:l["a"],SystemMedia:s["a"]},inject:{lzFormItem:{default:null}},data:function(){return{dialog:!1,formattedValue:null,pickIndex:-1}},props:{multiple:Boolean,max:{type:[String,Number],default:8},title:{type:String,default:function(){var t;return(null===(t=this.lzFormItem)||void 0===t?void 0:t.label)||"选择文件"}},value:null,ext:String,valueFields:{type:String,default:"path"},flatValue:{type:Boolean,default:!0}},computed:{pickerIcon:function(){return this.multiple?"multi-file":"single-file"},canPick:function(){return!this.isMax||this.isReplace},isMax:function(){return this.multiple&&this.value.length>=this.max||!this.multiple&&this.value},isReplace:function(){return-1!==this.pickIndex},miniWidth:function(){return this.$store.state.miniWidth},arrayValue:function(){return this.value?Array.isArray(this.value)?this.value:[this.value]:[]},mediaMultiple:function(){return!this.isReplace&&this.multiple}},methods:{onPick:function(){this.canPick&&(this.dialog=!0)},onPickConfirm:function(t){var e;t=t.map(this.formatReturn),this.multiple?this.isReplace?(e=this.value,e[this.pickIndex]=t[0]):e=this.value.concat(t.slice(0,this.max-this.value.length)):e=t[0],this.$emit("input",e),this.$refs.media.clearSelected(),this.dialog=!1},formatReturn:function(t){var e=this.valueFields?this.valueFields.split(","):[];return 0===e.length?t=Object(o["a"])({},t):(e.push("path"),t=c()(t,e)),e=Object(r["a"])(new Set(e)),this.flatValue&&1===e.length?t[e[0]]:t},remove:function(t){this.multiple?this.value.splice(t,1):this.$emit("input",null)},onReplace:function(t){this.pickIndex=t,this.onPick()}},watch:{dialog:function(t){t||(this.pickIndex=-1)}}},m=f,d=(a("03662"),a("daf7"),a("2877")),h=Object(d["a"])(m,i,n,!1,null,"f34a7758",null);e["a"]=h.exports},"743a":function(t,e,a){},a41d:function(t,e,a){},c358:function(t,e,a){"use strict";var i=a("743a"),n=a.n(i);n.a},c8d2:function(t,e,a){var i=a("d039"),n=a("5899"),r="​᠎";t.exports=function(t){return i((function(){return!!n[t]()||r[t]()!=r||n[t].name!==t}))}},daf7:function(t,e,a){"use strict";var i=a("a41d"),n=a.n(i);n.a}}]);
//# sourceMappingURL=chunk-e4c95b02.b6c20168.js.map