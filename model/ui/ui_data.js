var tpl_data = {
	app_name: "SerialScan",
	app_name_ext1: " USER ACCESS",
	app_name_ext2: ".dbQuery Console",
	lang_001:"session_user: ",
	lang_002:"session_login_time: ",
	lang_003:"New Session",
	lang_004:"Save & close session",
	lang_005:" Toggle-Edit",
	lang_006:" Text-size",
	lang_007:" Print or &nbsp<kbd>ctrl&nbsp+&nbspp</kbd>",
	lang_008:"Assembly number  ",
	lang_009:"Revision ",
	lang_010:"Sale Order ",
	lang_011:"Format ",
	lang_012:"Format Example ",
	lang_013:"new serial number (auto-submit)",
	lang_014:"Customer ",
	lang_015:"Login name",
	lang_016:"Password",
	lang_017:"New Session",
	lang_018:"Reset",
	lang_019:"Toggle",
	lang_020:"Script",
	lang_021:"MIME types defined: ",
	lang_022:"Query ",
	lang_023:" Search",
	lang_024:" display fetching queryResult",
	lang_025:" New Format",
	lang_026:" CMOD ENTER",
	sample_code: ` -- SQL Code Sample
					CREATE TABLE IF NOT EXISTS 'seriscan_format' (
						'id' int(11) NOT NULL AUTO_INCREMENT,
						-- id = formatId
						'format' varchar(60) NOT NULL,
						'format_example' varchar(60) NOT NULL,
						PRIMARY KEY ('id')
					) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ; `,
	logo_size: "border:0;max-width:40px;max-height:40px;",
	logo_file: "../img/serialscan.png",
	ent: "Express Manufacturing Inc.",
	cmod_link: '<a href="cmod_console.php"><span class="label label-default no-print"><span class="glyphicon glyphicon-cog"></span>&nbspCMOD&nbsp<span class="glyphicon glyphicon-barcode"></span>&nbsp<span class="glyphicon glyphicon-qrcode"></span></span></a>'
};

// object["property"] = value;
// object.property = value;

// Retrieve dynamic data
if (localStorage.getItem("sessionData")){
	var jsonData = JSON.parse(localStorage.getItem("sessionData"));
	var tpl_data2 = {
		tpl_dataObj:{
			primary_key: jsonData.primary_key,
		    assembly: jsonData.assembly,
		    revision: jsonData.revision,
		    customer: jsonData.customer,
		    sale_order: jsonData.sale_order,
		    format: jsonData.format,
		    format_example: jsonData.format_example,
		    access_level: jsonData.access_level,
		    username: jsonData.username,
		    time: jsonData.time,
		    sessionId: "sessionId: " + jsonData.sessionId
		}
	};
		// if (jsonData.length)
		// Merge tpl_data2 into tpl_data
		$.extend( tpl_data, tpl_data2 );
}

localStorage.setItem("tpl_data", JSON.stringify(tpl_data));