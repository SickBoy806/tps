import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// resources/js/bootstrap.js
try {
    window.Popper = require('@popperjs/core');
    window.Bootstrap = require('bootstrap');
} catch (e) {}