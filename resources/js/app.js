import './bootstrap';
import "bootstrap-icons/font/bootstrap-icons.css";
import Swal from 'sweetalert2';
import './notify'; // Ensure this is imported after Swal
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.defer(() => {
    Alpine.start();
});
