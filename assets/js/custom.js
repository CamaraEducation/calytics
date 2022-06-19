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