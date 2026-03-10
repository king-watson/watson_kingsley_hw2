import { createApp } from 'vue';

const Counter = {
  props: ['start'],
  data() {
    return { count: Number(this.start) }
  },
  template: `
    <div>
      <p>Count: {{ count }}</p>
      <button @click="count++">Increment</button>
      <button @click="count--" :disabled="count===0">Decrement</button>
      <button @click="count=0" :disabled="count===0">Reset</button>
    </div>
  `
}

const myApp = createApp({})
.component('counter', Counter)
.mount('#app')