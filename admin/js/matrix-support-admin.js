
jQuery(document).ready(function($) {
    var pluginTable = jQuery('<table />');
    pluginTable.addClass('widefat').css({'width': 'unset', 'min-width': '500px', 'margin': '20px 0'})
    jQuery('#update-plugins-table .plugin-title strong').each(function(i,item){
        var pluginTableTr = jQuery('<tr />'); 
        
        pluginTableTr.append(jQuery('<td />').html(jQuery(item).text()));
        pluginTableTr.append(jQuery('<td />').html(jQuery(item).parent().text().match(/\sYou have version .* installed/gm)[0].trim().match(/[0-9][0-9.]*[0-9]/gm)));
        pluginTableTr.append(jQuery('<td />').html(jQuery(item).parent().text().match(/\sUpdate to .* View /gm)[0].trim().match(/[0-9][0-9.]*[0-9]/gm)));
        
        pluginTable.append(pluginTableTr);
    })
    
    jQuery('#update-plugins-table').parent().prepend(pluginTable);
  });