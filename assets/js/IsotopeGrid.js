import Isotope from 'isotope-layout';

export default class IsotopeGrid {
    constructor(gridSelector, itemSelector, filterSelector, searchInputSelector, sortingType) {
        this.gridSelector = gridSelector;
        this.itemSelector = itemSelector;
        this.filterSelector = filterSelector;
        this.searchInputSelector = searchInputSelector;
        this.sortingType = sortingType;
        this.filterSelects = [];
        this.searchText = ''; 

        // Capture du contexte de la classe
        const self = this;

        this.isotope = $(this.gridSelector).isotope({
            itemSelector: this.itemSelector,
            layoutMode: 'fitRows',
            filter: function() {
                const selectionFilters = self.getSelectionFilters();
                
                const $item = $(this);

                // Si pas de filtres actifs
                if (self.searchText === '' && selectionFilters === '*') {
                    return true;
                }

                // Vérifie les filtres de sélection
                let matchesSelections = true;
                if (selectionFilters !== '*') {
                    const filterClasses = selectionFilters.split(',').map(f => f.trim());
                    matchesSelections = filterClasses.some(className => 
                        $item.is(className)
                    );
                }
                
                if (self.searchText === '') {
                    return matchesSelections;
                }

                // Recherche dans le contenu du titre
                const $title = $item.find('.card--title');
                const matchesSearch = $title.length ? 
                    $title.text().toLowerCase().includes(self.searchText.toLowerCase()) :
                    $item.text().toLowerCase().includes(self.searchText.toLowerCase());

                return matchesSearch && matchesSelections;
            }
        });

        this.initItems();
        this.initFilters();
        this.initSearch();
    }

    initItems() {
        const items = document.querySelectorAll(this.itemSelector);
        items.forEach(item => {
            const titleElement = item.querySelector('.card--title');
            if (titleElement) {
                item.dataset.filter = new RegExp(titleElement.textContent, 'gi');
            }
        });
    }

    initFilters() {
        this.filterSelects = document.querySelectorAll(this.filterSelector);
        this.filterSelects.forEach(select => {
            select.addEventListener('change', () => {
                this.isotope.isotope();
            });
        });
    }

    initSearch() {
        const searchInput = document.querySelector(this.searchInputSelector);
        if (searchInput) {
            searchInput.addEventListener('keyup', debounce(() => {
                this.searchText = searchInput.value;
                this.isotope.isotope();
            }, 200));
        }
    }
    
    getSelectionFilters() {
        let filters = [];
        this.filterSelects.forEach(select => {
            let value = select.value;
            if (value !== '*') {
                filters.push(value);
            }
        });

        if (filters.length === 0) return '*';

        return this.sortingType === 'some' 
            ? filters.map((filter, index) => index < filters.length - 1 ? `${filter}, `: filter).join('')
            : filters.map(filter => filter).join('');
    }
}

function debounce(fn, threshold = 100) {
    let timeout;
    return () => {
        clearTimeout(timeout);
        const args = arguments;
        const _this = this;
        timeout = setTimeout(() => fn.apply(_this, args), threshold);
    };
}