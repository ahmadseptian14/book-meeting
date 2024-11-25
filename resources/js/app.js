import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const toastOptions = {
        position: 'top-right', // Posisi notifikasi
        timeout: 3000,       // Durasi tampil
    };
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(Toast, toastOptions) // Tambahkan Vue Toast
      .mount(el)
  },
  progress: {
    color: '#4B5563',
  },
})
