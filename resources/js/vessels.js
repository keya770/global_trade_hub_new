$(document).ready(function() {
    // Vessel filtering functionality
    function filterVessels() {
        const vesselType = $('#vessel-type').val();
        const listingType = $('#listing-type').val();
        const yearBuilt = parseInt($('#year-built').val()) || 0;
        const dwtMin = parseInt($('#dwt-min').val()) || 0;
        
        let visibleCount = 0;
        
        $('.vessel-card').each(function() {
            const $card = $(this);
            const cardType = $card.data('type');
            const cardListing = $card.data('listing');
            const cardYear = parseInt($card.data('year'));
            const cardDwt = parseInt($card.data('dwt'));
            
            let showCard = true;
            
            // Filter by vessel type
            if (vesselType && cardType !== vesselType) {
                showCard = false;
            }
            
            // Filter by listing type
            if (listingType && cardListing !== listingType) {
                showCard = false;
            }
            
            // Filter by year built
            if (yearBuilt && cardYear < yearBuilt) {
                showCard = false;
            }
            
            // Filter by minimum DWT
            if (dwtMin && cardDwt < dwtMin) {
                showCard = false;
            }
            
            if (showCard) {
                $card.fadeIn(300);
                visibleCount++;
            } else {
                $card.fadeOut(300);
            }
        });
        
        // Show/hide no results message
        if (visibleCount === 0) {
            $('#no-results').fadeIn(300);
        } else {
            $('#no-results').fadeOut(300);
        }
        
        // Update results count
        updateResultsCount(visibleCount);
    }
    
    // Update results count
    function updateResultsCount(count) {
        let countText = `${count} vessel${count !== 1 ? 's' : ''} found`;
        
        if (!$('#results-count').length) {
            $('#vessels-container').before(`
                <div id="results-count" class="text-center mb-8">
                    <p class="text-lg opacity-90">${countText}</p>
                </div>
            `);
        } else {
            $('#results-count p').text(countText);
        }
    }
    
    // Search button click
    $('#search-btn').click(function() {
        filterVessels();
        
        // Add loading animation
        $(this).html('<i class="fas fa-spinner fa-spin mr-2"></i>Searching...');
        
        setTimeout(() => {
            $(this).html('<i class="fas fa-search mr-2"></i>Search');
        }, 1000);
    });
    
    // Real-time filtering as user types/selects
    $('#vessel-type, #listing-type').change(filterVessels);
    $('#year-built, #dwt-min').on('input', debounce(filterVessels, 500));
    
    // Debounce function to limit API calls
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Clear filters functionality
    function clearFilters() {
        $('#vessel-type, #listing-type').val('');
        $('#year-built, #dwt-min').val('');
        $('.vessel-card').fadeIn(300);
        $('#no-results').fadeOut(300);
        updateResultsCount($('.vessel-card').length);
    }
    
    // Add clear filters button
    $('#search-btn').after(`
        <button id="clear-filters-btn" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded-lg transition-colors ml-2">
            <i class="fas fa-times mr-2"></i>Clear
        </button>
    `);
    
    $('#clear-filters-btn').click(clearFilters);
    
    // View details button functionality
    $(document).on('click', '.view-details-btn', function() {
        const $card = $(this).closest('.vessel-card');
        const vesselTitle = $card.find('h3').text();
        
        // Create modal for vessel details
        const modal = $(`
            <div id="vessel-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75">
                <div class="bg-gray-800 rounded-lg p-8 max-w-2xl w-full max-h-90vh overflow-y-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-3xl font-bold">${vesselTitle}</h2>
                        <button id="close-modal" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="h-64 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                            <i class="fas fa-ship text-white text-6xl"></i>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-bold mb-4">Vessel Specifications</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span>Built:</span>
                                        <span>${$card.data('year')}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>DWT:</span>
                                        <span>${$card.data('dwt').toLocaleString()}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Flag:</span>
                                        <span>Marshall Islands</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Class:</span>
                                        <span>ABS</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>IMO:</span>
                                        <span>9123456</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-xl font-bold mb-4">Additional Details</h3>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span>Length:</span>
                                        <span>274.0 m</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Beam:</span>
                                        <span>48.0 m</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Draft:</span>
                                        <span>16.5 m</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Main Engine:</span>
                                        <span>MAN B&W</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Speed:</span>
                                        <span>14.5 knots</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-xl font-bold mb-4">Description</h3>
                            <p class="opacity-90">
                                This vessel is in excellent condition and has been well-maintained throughout its service life. 
                                Recent dry-dock completed with all necessary repairs and upgrades. All certificates are valid 
                                and in order. The vessel is available for immediate inspection and delivery.
                            </p>
                        </div>
                        
                        <div class="border-t border-gray-700 pt-6">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-700 py-3 rounded-lg transition-colors">
                                    <i class="fas fa-envelope mr-2"></i>Request Information
                                </button>
                                <button class="flex-1 bg-green-600 hover:bg-green-700 py-3 rounded-lg transition-colors">
                                    <i class="fas fa-phone mr-2"></i>Schedule Inspection
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        
        $('body').append(modal);
        modal.fadeIn(300);
        
        // Close modal functionality
        $('#close-modal, #vessel-modal').click(function(e) {
            if (e.target === this) {
                modal.fadeOut(300, function() {
                    modal.remove();
                });
            }
        });
        
        // Prevent modal from closing when clicking inside content
        modal.find('.bg-gray-800').click(function(e) {
            e.stopPropagation();
        });
    });
    
    // Vessel card hover effects
    $('.vessel-card').hover(
        function() {
            $(this).find('.h-48').addClass('scale-105');
        },
        function() {
            $(this).find('.h-48').removeClass('scale-105');
        }
    );
    
    // Sort functionality
    function addSortOptions() {
        $('#search-btn').parent().append(`
            <select id="sort-select" class="bg-gray-600 border border-gray-500 rounded-lg px-4 py-3 text-white ml-2">
                <option value="">Sort by...</option>
                <option value="year-desc">Year Built (Newest First)</option>
                <option value="year-asc">Year Built (Oldest First)</option>
                <option value="dwt-desc">DWT (Highest First)</option>
                <option value="dwt-asc">DWT (Lowest First)</option>
                <option value="name-asc">Name (A-Z)</option>
                <option value="name-desc">Name (Z-A)</option>
            </select>
        `);
    }
    
    addSortOptions();
    
    $('#sort-select').change(function() {
        const sortBy = $(this).val();
        if (!sortBy) return;
        
        const $container = $('#vessels-container');
        const $cards = $container.find('.vessel-card').get();
        
        $cards.sort(function(a, b) {
            const $a = $(a);
            const $b = $(b);
            
            switch(sortBy) {
                case 'year-desc':
                    return $b.data('year') - $a.data('year');
                case 'year-asc':
                    return $a.data('year') - $b.data('year');
                case 'dwt-desc':
                    return $b.data('dwt') - $a.data('dwt');
                case 'dwt-asc':
                    return $a.data('dwt') - $b.data('dwt');
                case 'name-asc':
                    return $a.find('h3').text().localeCompare($b.find('h3').text());
                case 'name-desc':
                    return $b.find('h3').text().localeCompare($a.find('h3').text());
                default:
                    return 0;
            }
        });
        
        // Animate the reordering
        $container.fadeOut(200, function() {
            $.each($cards, function(i, card) {
                $container.append(card);
            });
            $container.fadeIn(200);
        });
    });
    
    // Initialize results count
    updateResultsCount($('.vessel-card').length);
    
    // Add loading animation for vessel cards
    $('.vessel-card').each(function(index) {
        $(this).css('opacity', '0');
        $(this).delay(index * 100).animate({ opacity: 1 }, 600);
    });
});