/**
 * Created by enter on 2017/2/20.
 */
import Vue from 'vue'
import { Button, Select } from 'element-ui'
import App from './App.vue'

Vue.component(Button.name, Button)
Vue.component(Select.name, Select)

new Vue({
        el: '#app',
        render: h => h(App)
})