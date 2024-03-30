var buttonElement = document.querySelector("#download");
buttonElement.addEventListener('click', function() {
    var bookingData = document.getElementById("bookingData").outerHTML;
    var windowObject = window.open();

    windowObject.document.write('<html><head><title>Booking Data</title>');
    windowObject.document.write('<style>table { border-collapse: collapse; } table, th, td { border: 1px solid black; padding: 5px; }</style>');
    windowObject.document.write('</head><body>');
    windowObject.document.write(bookingData);
    windowObject.document.write('</body></html>');

    windowObject.document.close();
    windowObject.print();
    windowObject.close();
});
