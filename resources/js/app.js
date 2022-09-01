
import { createApp } from 'vue';

// Main App Component
import Home from './views/Home.vue'
import ContactShow from './views/ContactShow'

// Init App
const app = createApp({
    components: {
        'home-component': Home,
        'contact-show-component': ContactShow
    }
});

// Mount the App
app.mount('#root')
