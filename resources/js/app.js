import './bootstrap';

require('toastr/toastr.scss');
window.toastr = require('toastr');

import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();
