function openBrWindow(url, name, width, height, scrollbars, location, menubar, status, toolbar, position) {
	var str = "height=" + height + ",innerHeight=" + height;
	str += ",width=" + width + ",innerWidth=" + width;

	if (window.screen) {
		var ah = screen.availHeight - 30;
		var aw = screen.availWidth - 10;

		if (position == "center") {
			var xc = (aw - width) / 2;
			var yc = (ah - height) / 2;
		} else if (position == "topleft") {
			var xc = 0;
			var yc = 0;
		} else if (position == "topright") {
			var xc = aw - width;
			var yc = 0;
		}
		
		str += ",left=" + xc + ",screenX=" + xc;
		str += ",top=" + yc + ",screenY=" + yc;
		str += ",location=" + location + ",menubar=" + menubar + ",scrollbars=" + scrollbars + ",status=" + status + ",toolbar=" + toolbar;
	}
	var myWin = window.open(url, name, str);
}

/* commented this out since it coflicts with the one on the faq.js
So watch out on removing the comments toggleUPload below
This function is re-named to 
function toggle(targetId) {
	var ele = document.getElementById(targetId);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	} else {
		ele.style.display = "block";
	}
}
*/

function toggleUPload(targetId) {
	var ele = document.getElementById(targetId);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
  	} else {
		ele.style.display = "block";
	}
}



function closeModal(div1, div2) {
	$("#ctl00_AdminTopBar1_dropModuleTypeID").attr('style','display:block');
	$("#ctl00_cphMainContent_dropLangID").attr('style','display:block');
	$("#ctl00_cphMainContent_dropParentID").attr('style','display:block');
	$("#ctl00_cphMainContent_dropMasterPage").attr('style','display:block');

	if (div1 != '') document.getElementById(div1).style.display='none';
	if (div2 != '') document.getElementById(div2).style.display='none'
}

function openModal(div1, div2) {
	$("#ctl00_AdminTopBar1_dropModuleTypeID").attr('style','display:none');
	$("#ctl00_cphMainContent_dropLangID").attr('style','display:none');
	$("#ctl00_cphMainContent_dropParentID").attr('style','display:none');
	$("#ctl00_cphMainContent_dropMasterPage").attr('style','display:none');

	if (div1 != '') document.getElementById(div1).style.display='block';
	if (div2 != '') document.getElementById(div2).style.display='block'
}

// Module Settings
$(document).ready(function() {
    $(".modSettingsSwitch").click(function() {
        $(this).next("div.divModSetting").slideToggle("2000").Stop();
    });
    if ($("a.modSettingsSwitch").hasClass("expand")) {
        $(".modSettingsSwitch").trigger("click");
    }
});