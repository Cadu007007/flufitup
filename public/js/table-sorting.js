/* Dashbord New Clients Sorting */
var table = document.getElementById('newClientsTable')
if (table) {
    var tableHead = table.querySelector('thead'),
        tableHeaders = tableHead.querySelectorAll('th'),
        tableBody = table.querySelector('tbody');
    tableHead.addEventListener('click', function(e) {
        var tableHeader = e.target,
            textContent = tableHeader.textContent,
            tableHeaderIndex, isAscending, order;
        if (textContent !== 'City' && textContent !== 'Package Name') {
            while (tableHeader.nodeName !== 'TH') {
                tableHeader = tableHeader.parentNode;
            }
            tableHeaderIndex = Array.prototype.indexOf.call(tableHeaders, tableHeader);
            isAscending = tableHeader.getAttribute('data-order') === 'asc';
            order = isAscending ? 'desc' : 'asc';
            tableHeader.setAttribute('data-order', order);
            tinysort(
                tableBody.querySelectorAll('tr'), {
                    selector: 'td:nth-child(' + (tableHeaderIndex + 1) + ')',
                    order: order
                }
            );
        }
    });
}


/* Drivers Sorting */
var table = document.getElementById('driversTable')
if (table) {
    var tableHead = table.querySelector('thead'),
        tableHeaders = tableHead.querySelectorAll('th'),
        tableBody = table.querySelector('tbody');
    tableHead.addEventListener('click', function(e) {
        var tableHeader = e.target,
            textContent = tableHeader.textContent,
            tableHeaderIndex, isAscending, order;
        if (textContent !== 'City Name' && textContent !== 'Assigned') {
            while (tableHeader.nodeName !== 'TH') {
                tableHeader = tableHeader.parentNode;
            }
            tableHeaderIndex = Array.prototype.indexOf.call(tableHeaders, tableHeader);
            isAscending = tableHeader.getAttribute('data-order') === 'asc';
            order = isAscending ? 'desc' : 'asc';
            tableHeader.setAttribute('data-order', order);
            tinysort(
                tableBody.querySelectorAll('tr'), {
                    selector: 'td:nth-child(' + (tableHeaderIndex + 1) + ')',
                    order: order
                }
            );
        }
    });
}

/* Pickup Planner Sorting */
var table = document.getElementById('PickupPlannerTable')
if (table) {
    var tableHead = table.querySelector('thead'),
        tableHeaders = tableHead.querySelectorAll('th'),
        tableBody = table.querySelector('tbody');
    tableHead.addEventListener('click', function(e) {
        var tableHeader = e.target,
            textContent = tableHeader.textContent,
            tableHeaderIndex, isAscending, order;
        if (textContent !== 'City Order Number' && textContent !== 'Drop off Address' &&
            textContent !== 'Number of Bags' && textContent !== 'Package Name' &&
            textContent !== 'Assigned To'
        ) {
            while (tableHeader.nodeName !== 'TH') {
                tableHeader = tableHeader.parentNode;
            }
            tableHeaderIndex = Array.prototype.indexOf.call(tableHeaders, tableHeader);
            isAscending = tableHeader.getAttribute('data-order') === 'asc';
            order = isAscending ? 'desc' : 'asc';
            tableHeader.setAttribute('data-order', order);
            tinysort(
                tableBody.querySelectorAll('tr'), {
                    selector: 'td:nth-child(' + (tableHeaderIndex + 1) + ')',
                    order: order
                }
            );
        }
    });
}


/* Delievery Planner Sorting */
var table = document.getElementById('DelieveryPlannerTable')
if (table) {
    var tableHead = table.querySelector('thead'),
        tableHeaders = tableHead.querySelectorAll('th'),
        tableBody = table.querySelector('tbody');
    tableHead.addEventListener('click', function(e) {
        var tableHeader = e.target,
            textContent = tableHeader.textContent,
            tableHeaderIndex, isAscending, order;
        if (textContent !== 'City Order Number' && textContent !== 'Drop off Address' &&
            textContent !== 'Number of Bags' && textContent !== 'Package Name' &&
            textContent !== 'Assigned To'
        ) {
            while (tableHeader.nodeName !== 'TH') {
                tableHeader = tableHeader.parentNode;
            }
            tableHeaderIndex = Array.prototype.indexOf.call(tableHeaders, tableHeader);
            isAscending = tableHeader.getAttribute('data-order') === 'asc';
            order = isAscending ? 'desc' : 'asc';
            tableHeader.setAttribute('data-order', order);
            tinysort(
                tableBody.querySelectorAll('tr'), {
                    selector: 'td:nth-child(' + (tableHeaderIndex + 1) + ')',
                    order: order
                }
            );
        }
    });
}