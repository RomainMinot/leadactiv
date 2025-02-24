import Isotope from 'isotope-layout';

export default class IsotopeGrid {
    constructor(gridSelector, itemSelector, filterSelector, sortingType) {
        this.gridSelector = gridSelector;
        this.itemSelector = itemSelector;
        this.filterSelector = filterSelector;
        this.sortingType = sortingType;
        this.filterSelects = [];
        
        this.isotope = new Isotope(this.gridSelector, {
            itemSelector: this.itemSelector,
            layoutMode: 'fitRows',
        });
        this.initFilters();
    }

    initFilters() {
        this.filterSelects = document.querySelectorAll(this.filterSelector);
        this.filterSelects.forEach(select => {
            select.addEventListener('change', () => {
                this.isotope.arrange({ filter: this.combineFilters('every') });
            });
        });
    }

    combineFilters() {
        let filters = [];
        this.filterSelects.forEach(select => {
            let value = select.value;
            if (value !== '*') {
                filters.push(value);
            }
        });

        if (filters.length === 0) return true;

        return this.sortingType === 'some' 
            ? filters.map((filter, index) => index < filters.length - 1 ? `${filter}, `: filter).join('')
            : filters.map(filter => filter).join('');
    }
}