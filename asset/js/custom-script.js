
function downloadTableAsXLSX() {
    /* Convert table to worksheet */
    var table = document.getElementById("dataTable");
    var ws = XLSX.utils.table_to_sheet(table);

    /* Create workbook and add the worksheet */
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    /* Convert workbook to binary XLSX file and trigger download */
    var wbout = XLSX.write(wb, { bookType: "xlsx", type: "binary" });
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
        return buf;
    }
    saveAs(new Blob([s2ab(wbout)], { type: "application/octet-stream" }), "table.xlsx");
}


// custom-script.js

// FOT PDF -----------------------------

function downloadTableAsPDF() {
    const element = document.getElementById("dataTablePDF");

    // Define configuration object
    const options = {
        margin: 0, // Set margin (in mm)
        filename: 'table.pdf', // Set filename
        image: { type: 'jpeg', quality: .95 }, // Set image quality (1 is highest)
        html2canvas: { scale: 5 }, // Set scale for HTML to canvas conversion
        jsPDF: { 
            unit: 'mm', // Set measurement unit to millimeters
            format: 'a2', // Set page format to A4
            orientation: 'landscape', // Set orientation to landscape
            compressPDF: true, // Enable PDF compression
            // Set width and height (in mm)
            width: 1400, 
            height: 1200
        }
    };

    // Convert HTML element to PDF with specified options
    html2pdf().set(options).from(element).save();
}

function updateCurrentTime() {
    // Get the current time in the user's timezone
    var currentTime = new Date();
    
    // Format the time as HH:MM:SS
    var hours = ('0' + currentTime.getHours()).slice(-2);
    var minutes = ('0' + currentTime.getMinutes()).slice(-2);
    var seconds = ('0' + currentTime.getSeconds()).slice(-2);
    var timeString = hours + ':' + minutes + ':' + seconds;
    
    // Update the displayed time
    document.getElementById('current-time').textContent = timeString;
    
    // DATE 
    var year = currentTime.getFullYear(); // Get the year (YYYY)
    var month = ('0' + (currentTime.getMonth() + 1)).slice(-2); // Get the month (MM)
    var day = ('0' + currentTime.getDate()).slice(-2); 
    
    var dateString = day + '/' + month + '/' + year;

    document.getElementById('current-date').textContent = dateString;
}

// Update the time initially
updateCurrentTime();

// Update the time every second
setInterval(updateCurrentTime, 1000);

