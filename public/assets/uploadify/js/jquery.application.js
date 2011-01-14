function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

jQuery(document).ready(function() {
//alert( $.cookie("fuelcid") );


jQuery('#mainftp').uploadify({
    'uploader'    : '/assets/uploadify/swf/uploadify.swf',
    'script'    : '/index.php/uploadify/do_upload', // index.php in case we don't have mod_rewrite...
    'multi'            : true,
    'auto'            : true,
    'height'        :    '32', //height of your browse button file
    'width'            :    '250', //width of your browse button file
    //'sizeLimit'    :    '51200',  //remove this to set no limit on upload size
    'simUploadLimit' : '2', //remove this to set no limit on simultaneous uploads
    'buttonImg' : '/assets/uploadify/img/browse.png',
    'cancelImg' : '/assets/uploadify/img/cancel.png',
    //'fileDataName': 'userfile1',
    'removeCompleted': true,
    'fileDesc': 'Image Files',
    'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
    'buttonText': 'Select Files',
    'displayData': 'speed',
    'scriptData'  : {'uploadify': getCookie('fuelcid')},

    onError: function (a, b, c, d) { // these are a bit debugging, onError - can be easily removed, just for tests 
    if (d.status == 404)
        alert('Could not find upload script. Use a path relative to: '+'<? echo getcwd() ?>');
    else if (d.type === "HTTP")
        alert('error '+d.type+": "+d.status);
    else if (d.type ==="File Size")
        alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
    else
        alert('error '+d.type+": "+d.text);
    },
    //'folder'    : 'files/', //folder to save uploads to
    onProgress: function() {
      $('#loader').show();
    },
    onAllComplete: function() {
      $('#loader').hide();
      $('#allfiles').load(location.href+" #allfiles>*","");
      //location.reload(); //uncomment this line if youw ant to refresh the whole page instead of just the #allfiles div
    }
});

jQuery('ul li:odd').addClass('odd');


});
