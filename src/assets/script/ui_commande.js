document.querySelectorAll('.selector_commande').forEach(selector => {
    selector.addEventListener('click', function(event) {

        clearSelection();
        console.log('Selector clicked:', this);
        this.classList.remove('bg-base-100');
        this.classList.add('bg-base-300');

    });
})

function clearSelection() {
    document.querySelectorAll('.selector_commande').forEach(selector => {
        selector.classList.remove('bg-base-300');
        selector.classList.add('bg-base-100');
    });
}