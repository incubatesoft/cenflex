$(document).ready(function(){
	
	$(".exRate").livequery(function(){
		$(this).delayedObserver(function(){
			optionid=$.trim($(".active_tab").attr("estopt"));
			adjustedXrate(optionid);
				//alert(adjustXrate);
			 });
	});
 });



$(".calEst").livequery(function(){
	$(this).delayedObserver(function(){
		$(this).closest(".job_estimates").trigger("recalculate")
						 })
})

//Calculate Adjusted Xrate
function adjustedXrate(optionid){
		//alert("adjustedXrate");
	var exchangeRate;
		($.trim($("#exchangeRate_"+optionid).val())=="")?exchangeRate=0:exchangeRate=parseInt($.trim($("#exchangeRate_"+optionid).val()));
	var vat;
		($.trim($("#vat_"+optionid).val())=="")?vat=0:vat=parseInt($.trim($("#vat_"+optionid).val()));
	var vatBack;
		($.trim($("#vatback_"+optionid).val())=="")?vatBack=0:vatBack=parseInt($.trim($("#vatback_"+optionid).val()));
	var exportFee;
		($.trim($("#exportfee_"+optionid).val())=="")?exportFee=0:exportFee=parseInt($.trim($("#exportfee_"+optionid).val()));
			

		vat=vat/100;
		vatBack=vatBack/100;
		exportFee=exportFee/100;
		
		var adjustXrate=((exchangeRate)*1.17)/(1+exportFee+vat-vatBack+0.02);

		
		updateXrate(optionid, adjustXrate);
}

//Calculate Adjusted Xrate ends

function updateXrate(optionid, adjustXrate){
		//alert("calmaincosts");
	
	$("#job_estimates_" +optionid + " .readonly.editmode .estimates_section").each(function(index){
		var templateid=	$("#templateSlect_"+optionid+" option:selected").attr("value");																				
	
		var vendor_est_total_obj = $(this).children(".vendor_section").children(".footer_row").children("li.s_2").children(".vendor_cst_total");
		var vendor_est_cst = parseInt($(vendor_est_total_obj).html());
		
		var ProfitMargin=0;
		/*if($(vendor_est_total_obj).hasClass("edited"))
		{*/
			if(index==1)
			ProfitMargin=$("#estRfqPrePressProfit_"+optionid).html();
			else if(index==3)
			ProfitMargin=$("#estRfqShippingProfit_"+optionid).html();
			else if(index==2)
			{
				ProfitMargin=getRangeMargin(templateid, optionid, vendor_est_cst);
			}
			
			//alert('ProfitMargin='+ProfitMargin);
			
			//ProfitMargin=0.11;
			
			ProfitMargin=ProfitMargin/100;
			
			//alert('vendor_est_cst='+vendor_est_cst);
			//alert('adjustXrate='+adjustXrate);
			
			var resVal=(vendor_est_cst+(vendor_est_cst*ProfitMargin)) * adjustXrate ;
			
			//alert('resVal='+resVal);
			
			//var resVal=(vendor_est_cst+ProfitMargin) * adjustXrate;
			$(this).children(".default_estimates").children(".cols_3").children(".cost_area").children(".effective_est_field").val(resVal.toFixed(2));
			
		/*	
		}*/
		
	});
	
	//$(".calEst").trigger("keyup");
	$("#job_estimates_" +optionid).trigger("recalculate");
		

}
//reCalculate Starts
function reCalculate(){
		//alert("grandtotal");
		var optionid=$(".h_tab li a.active_tab").attr("estopt");
		var PrePressCost;
		($.trim($("#prePpressCost_"+optionid).val())=="")?PrePressCost=0:PrePressCost=parseInt($.trim($("#prePpressCost_"+optionid).val()));
		var PrintingUnitCost;
		($.trim($("#printingUnitCost_"+optionid).val())=="")?PrintingUnitCost=0:PrintingUnitCost=parseInt($.trim($("#printingUnitCost_"+optionid).val()));
		var PrintingCost;
		($.trim($("#printingCost_"+optionid).val())=="")?PrintingCost=0:PrintingCost=parseInt($.trim($("#printingCost_"+optionid).val()));
		var ShippingCost;
		($.trim($("#shippingCost_"+optionid).val())=="")?ShippingCost=0:ShippingCost=parseInt($.trim($("#shippingCost_"+optionid).val()));
		var FedexCost;
		($.trim($("#samplesFedexFee_"+optionid).val())=="")?FedexCost=0:FedexCost=parseInt($.trim($("#samplesFedexFee_"+optionid).val()));
		var ImportDuty;
		($.trim($("#importDuty_"+optionid).val())=="")?ImportDuty=0:ImportDuty=parseInt($.trim($("#importDuty_"+optionid).val()));
		var Insurance;
		($.trim($("#insurance_"+optionid).val())=="")?Insurance=0:Insurance=parseInt($.trim($("#insurance_"+optionid).val()));
		var Quantity;
		($.trim($("#rfqEst_quantity_"+optionid).val())=="")?Quantity=0:Quantity=parseInt($.trim($("#rfqEst_quantity_"+optionid).val()));
		
		if(PrePressCost && PrintingCost && ShippingCost && FedexCost && ImportDuty && Insurance)
		{ 	
			//alert("all")
			$("#save_prv_est_"+optionid).addClass("smallactive");
		} else{
			$("#save_prv_est_"+optionid).removeClass("smallactive");
		}
			//alert(PrePressCost+"--"+PrintingCost+"--"+ShippingCost+"--"+FedexCost+"--"+ImportDuty+"--"+Insurance)
		var GrandTotal=PrePressCost+PrintingCost+ShippingCost+FedexCost+ImportDuty+Insurance;
		
		//alert(GrandTotal)
						$("#lableGT_"+optionid).html("$"+GrandTotal);
						$("#grandTotal_"+optionid).val(GrandTotal);
						
				
				if(Quantity)
					{	
						//alert(GrandTotal)
						var TotalCostPerUnitPrinting =PrintingCost/Quantity;
						var TotalCostPerUnit = GrandTotal/Quantity;
						TotalCostPerUnitPrinting=TotalCostPerUnitPrinting.toFixed(2);
						TotalCostPerUnit=TotalCostPerUnit.toFixed(2);
						
						$("#lableGT_"+optionid).html("$"+GrandTotal);
						$("#grandTotal_"+optionid).val(GrandTotal);
						$("#printingUnitCost_"+optionid).val(TotalCostPerUnitPrinting);
						$("#TCPU_"+optionid).val(TotalCostPerUnit);
						$("#lableTCPU_"+optionid).html("$"+TotalCostPerUnit);
						}
				else
					{
						$("#lableGT_"+optionid).html("--");
						$("#printingCost_"+optionid).val("");
						$("#hprint_unit_cost_"+optionid).val("");
					}	

}

//reCalculate ends

//calculate unit printing cost
$(".CalRel").livequery(function(){
		$(this).delayedObserver(function(){
			//alert("printing unit cost");
			var optionid=$(".h_tab li a.active_tab").attr("estopt");
			var PrintingUnitCost;
			($.trim($("#printingUnitCost_"+optionid).val())=="")?PrintingUnitCost=0:PrintingUnitCost=parseInt($.trim($("#printingUnitCost_"+optionid).val()));
			
			var Quantity;
			($.trim($("#rfqEst_quantity_"+optionid).val())=="")?Quantity=0:Quantity=parseInt($.trim($("#rfqEst_quantity_"+optionid).val()));
				
					PrintingCost=PrintingUnitCost*Quantity;
					//alert(PrintingCost)
					$("#printingCost_"+optionid).val(PrintingCost)
					$("#job_estimates_" +optionid).trigger("recalculate");
			
			});
		
	});


function getRangeMargin(temp_id, optionid, vendor_est_cst){
	var valmargin = -1;
	
	$("#PmValues_" + optionid).children(".estTemid[rel='"+ temp_id +"']").children(".estTemidval").each(function(){
	
		var range = $(this).find(".valRange").attr("rel").split("--");
		
		
		if(eval(vendor_est_cst) >= eval(range[0]) && eval(vendor_est_cst) <= eval(range[1])){
			valmargin = $(this).find(".valRange").attr("margin_val");
		}

	});
	return valmargin;
}

//end calculate unit printing cost





