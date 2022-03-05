require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

/**
 * Handle clicks on claim, edit and delete buttons
 */
window.clickWishButton = function(type, wishId) {
    console.log(type, wishId);
    const button = document.getElementById(type + wishId);
    if (type === 'claim') {
        // tick checkbox
        const svg = button.getElementsByClassName('my-claim')[0];
        const action = svg.classList.contains('hidden') ? 'claim' : 'unclaim';
        svg.classList.toggle('hidden');
        // send to backend
        axios.post('/api/wish/claim', {id: wishId, action: action});

    } else if (type === 'edit') {
        window.location.href('/wish/edit/' + wishId);

    } else if (type === 'delete') {


    }
}
