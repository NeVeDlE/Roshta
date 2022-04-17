require('./bootstrap');
require('../assets/scripts/main')
require('../assets/scripts/bootstrap.bundle.js')
require('../assets/scripts/all.min')
require('../assets/scripts/jquery-3.6.0')
/*import '../assets/scripts/main'
import '../assets/scripts/bootstrap.bundle.js'
import '../assets/scripts/all.min'
import '../assets/scripts/jquery-3.6.0'*/
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
