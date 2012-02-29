$(".raju_bogi_edit").editable(base_url+'admin/arg/edit_response_txt', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 event: 'dblclick',
					 type  : 'mce',
					 cssclass : 'editing',
					 onblur: "ignore",
					 width:'80%',
					 submit: "Save",
					 cancel:'Cancel',
					 id:'rel',
					 tooltip   : 'Click to edit...',
					 callback : function(value, settings) {alert("t");
							$(this).removeClass("editing_this").addClass("edit_saved");
				 }
				 });