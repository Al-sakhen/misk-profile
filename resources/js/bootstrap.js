import _ from 'lodash';
window._ = _;

import 'bootstrap';

// import jquery from 'jquery';
import $ from 'jquery';
window.$ = window.jQuery = $;

// import fontawesome from '@fortawesome/fontawesome-free';
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";

// import router for vue
import './router/index.js';



// import axios from 'axios';
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

