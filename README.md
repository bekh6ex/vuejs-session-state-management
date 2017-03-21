## Run
```bash
php -S 127.0.0.1:8080
```

[http://127.0.0.1/index.html](http://127.0.0.1/index.html)

## Stub code to avoid googling

```html
<div v-bind:class="{ class-name: isSomethingTrue }"></div>
```

```html
<li v-for="item in items">{{ item.text }}</li>
```

```html
<component1 v-bind:componentProp="localProp"/>
```

```js
Vue.component( 'component1', {
	props: ['item'],
	template: '<div class="item"></div>',
	data: {},
	computed: {}
} );

```

```html
<div class="item-list">
    <div class="item">text</div>
    <div class="item done">text</div>
    <div class="item">text<button>done</button><button>&times;</button></div>
</div>
```
