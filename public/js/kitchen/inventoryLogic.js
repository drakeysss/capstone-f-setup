//Search bar Logic

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('#searchLogic input');

    if (!searchInput) {
        console.warn('Search input not found!');
        return;
    }

    searchInput.addEventListener('input', function () {
        const searchItem = searchInput.value.toLowerCase();

        document.querySelectorAll('.searchable-item').forEach(item => {
            const itemText = item.textContent.toLowerCase();
            item.style.display = itemText.includes(searchItem) ? '' : 'none';
        });
    });
});


//Filter Logic

document.addEventListener('DOMContentLoaded', function () {
    const filterDropdown = document.querySelector('#filterLogic'); 

    if (!filterDropdown) {
        console.warn('Filter dropdown not found!');
        return;
    }

    filterDropdown.addEventListener('click', function (event) {
        const target = event.target;


        if (target.classList.contains('dropdown-item')) {
            const selectedFilter = target.getAttribute('data-value').toLowerCase(); 


            document.querySelectorAll('.filterable-item').forEach(item => {
                const itemStatus = item.getAttribute('data-status').toLowerCase();

                if (selectedFilter === 'all') {
                    item.style.display = '';
                } else {
                    item.style.display = itemStatus.includes(selectedFilter) ? '' : 'none'; 
                }
            });
        }
    });
});



