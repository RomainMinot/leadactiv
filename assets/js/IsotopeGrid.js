export default class IsotopeGrid {
    /**
     * @param {string} gridSelector - Sélecteur du conteneur grid
     * @param {string} itemSelector - Sélecteur des éléments à filtrer
     * @param {string} filterSelector - Sélecteur des éléments de filtrage
     * @param {string} searchInputSelector - Sélecteur de l'input de recherche
     * @param {string} sortingType - Type de tri ('some' pour OR, autre pour AND)
     */
    constructor(gridSelector, itemSelector, filterSelector, searchInputSelector, clearButtonSelector, sortingType) {
        this.initializeProperties(gridSelector, itemSelector, filterSelector, searchInputSelector, clearButtonSelector, sortingType);
        this.initializeIsotope();
        this.initializeComponents();
        this.initClearButton();
        this.checkUrlHash();
    }

    /**
     * Initialise les propriétés de la classe
     * @param {string} gridSelector - Sélecteur du conteneur grid
     * @param {string} itemSelector - Sélecteur des éléments à filtrer
     * @param {string} filterSelector - Sélecteur des éléments de filtrage
     * @param {string} searchInputSelector - Sélecteur de l'input de recherche
     * @param {string} clearButtonSelector - Sélecteur du bouton de réinitialisation
     * @param {string} sortingType - Type de tri ('some' pour OR, autre pour AND)
     */
    initializeProperties(gridSelector, itemSelector, filterSelector, searchInputSelector, clearButtonSelector, sortingType) {
        this.gridSelector = gridSelector;
        this.itemSelector = itemSelector;
        this.filterSelector = filterSelector;
        this.searchInputSelector = searchInputSelector;
        this.sortingType = sortingType;
        this.clearButtonSelector = clearButtonSelector;
        this.filterSelects = [];
        this.searchText = '';
        this.activeFilters = new Set();
    }

    /**
     * Initialise la grille Isotope avec les configurations
     */
    initializeIsotope() {
        const self = this;
        this.isotope = $(this.gridSelector).isotope({
            itemSelector: this.itemSelector,
            layoutMode: 'fitRows',
            filter: function() {
                return self.filterItem($(this));
            }
        });
    }

    /**
     * Initialise tous les composants nécessaires
     */
    initializeComponents() {
        this.initItems();
        this.initFilters();
        this.initSearch();
    }

    /**
     * Initialise les tags de filtres et le bouton clear
     */
    initClearButton() {
        this.clearButton = document.querySelector(this.clearButtonSelector);
        if (this.clearButton) {
            this.clearButton.addEventListener('click', () => this.clearAllFilters());
        }
    }

    /**
     * Vérifie le hash de l'URL et active le filtre correspondant
     */
    checkUrlHash() {
        const hash = window.location.hash.substring(1);
        if (!hash) return;
        
        const sectorSelect = Array.from(this.filterSelects).find(select => select.name === 'sector');
        if (!sectorSelect) return;
        
        const option = Array.from(sectorSelect.options).find(opt => opt.value === `.${hash}`);
        if (option) {
            sectorSelect.value = option.value;
            this.addFilter(option.value, option.text, 'sector');
            this.updateFilters();
        }
    }

    /**
     * Filtre un élément individuel
     * @param {jQuery} $item - Élément jQuery à filtrer
     * @returns {boolean} - True si l'élément doit être affiché
     */
    filterItem($item) {
        const selectionFilters = this.getSelectionFilters();

        // Cas où aucun filtre n'est actif
        if (this.searchText === '' && selectionFilters === '*') {
            return true;
        }

        const matchesSelections = this.checkSelectionMatch($item, selectionFilters);

        // Retourne le résultat si pas de recherche active
        if (this.searchText === '') {
            return matchesSelections;
        }

        const matchesSearch = this.checkSearchMatch($item);
        return matchesSearch && matchesSelections;
    }

    /**
     * Vérifie si l'élément correspond aux filtres de sélection
     * @param {jQuery} $item - Élément à vérifier
     * @param {string} selectionFilters - Filtres de sélection
     * @returns {boolean} - True si l'élément correspond aux filtres
     */
    checkSelectionMatch($item, selectionFilters) {
        if (selectionFilters === '*') return true;

        const filterClasses = selectionFilters.split(',').map(f => f.trim());
        return filterClasses.some(className => $item.is(className));
    }

    /**
     * Vérifie si l'élément correspond au texte recherché
     * @param {jQuery} $item - Élément à vérifier
     * @returns {boolean} - True si l'élément correspond à la recherche
     */
    checkSearchMatch($item) {
        const $title = $item.find('.card--title');
        const searchableText = $title.length ? 
            $title.text() : 
            $item.text();
        
        return searchableText.toLowerCase().includes(this.searchText.toLowerCase());
    }

    /**
     * Obtient les filtres de sélection combinés
     * @returns {string} - Sélecteurs CSS combinés
     */
    getSelectionFilters() {
        const activeFilters = Array.from(this.filterSelects)
            .map(select => select.value)
            .filter(value => value !== '*');

        if (activeFilters.length === 0) return '*';

        return this.sortingType === 'some' 
            ? activeFilters.join(', ')
            : activeFilters.join('');
    }

    /**
     * Initialise les éléments de la grille
     */
    initItems() {
        const items = document.querySelectorAll(this.itemSelector);
        items.forEach(item => {
            const titleElement = item.querySelector('.card--title');
            if (titleElement) {
                item.dataset.filter = new RegExp(titleElement.textContent, 'gi');
            }
        });
    }

    /**
     * Initialise les filtres de sélection
     */
    initFilters() {
        this.filterSelects = document.querySelectorAll(this.filterSelector);
        this.filterSelects.forEach(select => {
            select.addEventListener('change', (event) => {
                const { value, name: selectName } = event.target;
                if (value === '*') {
                    this.checkFilter(selectName);
                    return;
                }
                const label = event.target.options[event.target.selectedIndex].text;
                this.addFilter(value, label, selectName);
                this.updateFilters();
            });
        });
    }

    /**
     * Initialise la recherche
     */
    initSearch() {
        const searchInput = document.querySelector(this.searchInputSelector);
        if (searchInput) {
            searchInput.addEventListener('keyup', debounce(() => {
                this.searchText = searchInput.value;
                this.isotope.isotope();
            }, 200));
        }
    }

    /**
     * Ajoute un filtre et met à jour le tag correspondant
     * @param {string} value - Valeur du filtre à ajouter
     * @param {string} label - Texte à afficher pour le filtre
     * @param {string} selectName - Nom du select associé au filtre
     */
    addFilter(value, label, selectName) {
        this.checkFilter(selectName);
        this.activeFilters.add(value);
        this.showFilterTag(label, value, selectName);
    }

    /**
     * Retire un filtre et cache le tag correspondant
     * @param {HTMLElement} filterTag - Élément HTML du tag à supprimer
     * @param {string} value - Valeur du filtre à retirer
     */
    removeFilter(filterTag, value) {
        this.activeFilters.delete(value);
        // Réinitialiser le select correspondant
        this.filterSelects.forEach(select => {
            if (select.value === value) {
                select.value = '*';
            }
        });
        filterTag.remove();
    }

    /**
     * Vérifie si un filtre de la même catégorie existe déjà
     * @param {string} selectName - Nom du select à vérifier
     */
    checkFilter(selectName) {
        const tags = document.querySelectorAll('.tag');
        if (tags && tags.length > 0) {
            const categoryTag = Array.from(tags).find(tag => tag.dataset.selectName && tag.dataset.selectName === selectName);
            if (categoryTag) {
                const value = categoryTag.firstElementChild.textContent;
                this.removeFilter(categoryTag, value);
            }
        }
    }

    /**
     * Affiche le tag de filtre correspondant
     * @param {string} label - Texte à afficher dans le tag
     * @param {string} value - Valeur du filtre
     * @param {string} selectName - Nom du select
     */
    showFilterTag(label, value, selectName) {
        const container = document.getElementById('filterTagsContainer');
        if (!container) return;

        const coloredClass = selectName === 'sector' ? 'tag-light-purple' : 'tag-gray';

        const tagHTML = `
            <div class="tag ${coloredClass}" data-filter-value="${value}" data-select-name="${selectName}">
                <span>${label}</span>
                <i class="ml-2 fas fa-times"></i>
            </div>
        `;

        // Ajouter le tag au container
        container.insertAdjacentHTML('afterbegin', tagHTML);

        // Ajouter l'événement de suppression
        const newTag = container.querySelector('.tag').lastElementChild;
        newTag.addEventListener('click', () => {
            this.removeFilter(newTag.parentElement, value);
            this.updateFilters();
        });
    }
    
    /**
     * Nettoie tous les filtres
     */
    clearAllFilters() {
        this.activeFilters.clear();
        // Réinitialiser tous les selects
        this.filterSelects.forEach(select => {
            select.value = '*';
        });
        // Supprimer tous les tags
        const container = document.getElementById('filterTagsContainer');
        if (container) {
            const tags = container.querySelectorAll('.tag');
            for (const tag of tags) {
                tag.remove();
            }
        }
        this.updateFilters();
    }

    /**
     * Met à jour la grille Isotope avec les filtres actifs
     */
    updateFilters() {
        Array.from(this.activeFilters).length > 0 
        ? this.clearButton.classList.remove('d-none')
        : this.clearButton.classList.add('d-none');
        
        this.isotope.isotope();
    }
}

/**
 * Fonction utilitaire pour débouncer les événements
 */
function debounce(fn, threshold = 100) {
    let timeout;
    return function debounced(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => fn.apply(this, args), threshold);
    };
}