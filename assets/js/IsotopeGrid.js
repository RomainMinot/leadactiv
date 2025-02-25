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
        
        this.isotope = new Isotope(this.gridSelector, {
            itemSelector: this.itemSelector,
            layoutMode: 'fitRows',
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
                this.isotope.arrange({ filter: this.combineFilters() });
            });
        });
    }

    initSearch() {
        const searchInput = document.querySelector(this.searchInputSelector);
        if (searchInput) {
            searchInput.addEventListener('keyup', debounce(() => {
                this.searchText = new RegExp(searchInput.value, 'gi');
                this.isotope.arrange({ filter: this.combineFilters() });
            }, 200));
        }
    }

    combineFilters() {
        const selectionFilters = this.getSelectionFilters();
        const searchFilter = this.getSearchFilter();
        console.log(searchFilter);
        //this.searchText ? itemElem.textContent.match(this.searchText) : true;
        return selectionFilters;
       
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

    getSearchFilter() {
        return this.searchText === '' ? '*' : this.searchText;
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