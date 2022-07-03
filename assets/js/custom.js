function convert_sec_min(sec){
    min = Math.floor(sec / 60);
    sec = Math.floor(sec % 60);
    return min + " min , " + sec + " sec";
}

function convert_sec_hrs(sec){
    hrs = Math.floor(sec / 3600);
    min = Math.floor((sec - (hrs * 3600)) / 60);
    sec = sec % 60;
    return hrs + " hr , " + min + " min";
}

function convert_sec_min_hrs(sec){
    if(sec > 3600){
        return convert_sec_hrs(sec);
    }else{
        return convert_sec_min(sec);
    }
}

function timeCalc(i){
    return convert_sec_min_hrs(i);
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var printModal = document.getElementById('reportPrint')

    // replace printmodal content with printContents
    printModal.innerHTML = printContents;

    //toggle filterPortalReport modal
    //$('#filterPortalReport').modal('toggle');

    window.print();
}

function generate_pdf(){
    $("#btnConvert").on('click', function () {
        //var element = document.getElementById('print');
        //html2pdf(element);
        var divToPrint=document.getElementById('print');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    });
}

function filter_report(){
    // onfilter #filter click
    $("#filter").on('click', function () {
        // get date range from datepicker #range
        var date_range = $("#ranger").val();
        console.log(date_range);
    });
}