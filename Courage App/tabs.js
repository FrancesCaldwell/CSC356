    $(document).ready(function() {
        var tabButtons = $('.custom-tab');

        function updateTab(tabName) {
            // Update URL hash without page reload
            history.pushState(null, null, '#' + tabName);

            // Store the selected tab in localStorage
            localStorage.setItem('selectedTab', tabName);

            // Highlight the clicked tab
            tabButtons.removeClass('active');
            $('[data-tab="' + tabName + '"]').addClass('active');

            // Hide all content divs and show the selected one
            $('.content').removeClass('active');
            $('#' + tabName + 'Content').addClass('active');
        }

        tabButtons.on('click', function(event) {
            event.preventDefault();
            var tabName = $(this).data('tab');
            updateTab(tabName);
        });

        // Get the initial tab from localStorage, or set a default
        var initialTab = localStorage.getItem('selectedTab') || 'following';
        updateTab(initialTab);
    });

    function openTab(evt, tabName) {
        var tabContent, tabLinks;

        // Hide all content
        $('.content').hide();

        // Deactivate all tab links
        $('.tablink').removeClass('active');

        // Display the selected content and activate the tab
        $('#' + tabName).show();
        $(evt.currentTarget).addClass('active');
    }
