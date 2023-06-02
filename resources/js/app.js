require('./bootstrap');

import Alpine from 'alpinejs';
const moment = require('moment')


window.Alpine = Alpine;

Alpine.start();
import {
    createApp
} from 'vue';

import ItemCart from './Components/ItemCart.vue';

const app = createApp({
    data() {
        return {
        }
    },
    methods: {
        fetchMessages() {
            axios.get('/talk/' + this.talk_id + '/messages/').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            axios.post('/messages', {'message': message,'from': this.userId,'to': this.to,'talk_id': this.talk_id,'_token': this.csrfToken
            }).then((res) => {
                this.fetchMessages();
            })
        }
    },
    mounted() {
        /* this.fetchMessages(); */
    },
});
app.component('item-cart', ItemCart);
app.mount('#app');
