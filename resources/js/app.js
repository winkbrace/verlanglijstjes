require('./bootstrap');

const { toast } = require('tailwind-toast');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

/**
 * Handle clicks on claim, edit and delete buttons
 */
window.clickWishButton = function (type, wishId) {
    const button = document.getElementById(type + wishId);
    if (type === 'claim') {
        // tick checkbox
        const svg = button.getElementsByClassName('my-claim')[0];
        const action = svg.classList.contains('hidden') ? 'claim' : 'unclaim';
        svg.classList.toggle('hidden');
        // send to backend
        axios.post('/api/wish/claim', {id: wishId, action: action});

    } else if (type === 'edit') {
        window.location.href =  '/wish/edit/' + wishId;

    } else if (type === 'delete') {
        axios.post('/api/wish/delete/' + wishId)
            .then(() => {
                const li = button.closest('li');
                li.classList.add('transition-all', 'duration-500', 'ease-in-out', 'opacity-0');
                setTimeout(() => { li.classList.add('hidden') }, 500);
            })
            .catch(() => {
                toast()
                    .danger('Oeps!', 'Deleten is niet gelukt.')
                    .with({
                        color: 'bg-red-400',
                        positionY: 'top',
                        positionX: 'end',
                        shape: 'pill',
                        duration: 3000
                    }).show();
            });
    }
}
