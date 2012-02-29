function calculateSavings() {	
	var priceFinder = /(.*)(\$([0-9\.]+))(.*)/;
	
//	alert(slice(0,document.getElementById('new_price').value));
	//alert(document.getElementById('original_price').value);
	
	//var newPrice = $F('new_price').gsub(priceFinder,getPrice);
	//var originalPrice = $F('original_price').gsub(priceFinder,getPrice);
	
	var np = document.getElementById('new_price').value;
	
	var op = document.getElementById('original_price').value;
	
	//alert( np.replace( "$", "" ) );
	
	var newPrice = np.replace( "$", "" );
	var originalPrice = op.replace( "$", "" );
	
	var savings = '';
	var dollarSavings = calculateDollar(newPrice,originalPrice);
	
	//alert(dollarSavings);
	var percentSavings = calculatePercent(newPrice,originalPrice);
	//alert(percentSavings);
	
	if(dollarSavings >= percentSavings) {
		savings = ('SAVE $'+dollarSavings+'.00');
		
	} else {
		savings = ('SAVE '+percentSavings+'%');
	}
	if(document.getElementById('savings').value != '')
	{
		if(dollarSavings && percentSavings) {
			document.getElementById('savings').value = savings;
			//$('savings').value = savings;
		} else {
				document.getElementById('savings').value = savings;
			//$('savings').value = '';
		}
	}
	else
	{
		if(dollarSavings && percentSavings) {
			document.getElementById('save_perct').value = savings;
			//$('savings').value = savings;
		} else {
				document.getElementById('save_perct').value = savings;
			//$('savings').value = '';
		}	
	}
}

function calculateDollar(newPrice, originalPrice) {
	
	//alert(newPrice);
	//alert(originalPrice);
	
	var dollar = parseInt(originalPrice-newPrice);
	//alert(dollar);
	if(dollar <= 0 || isNaN(dollar)) {
		return '';
	}
	
	return dollar;
}

function calculatePercent(newPrice, originalPrice) {
	var percent = (100-Math.round((newPrice/originalPrice)*100));
	
	if(percent <= 0 || isNaN(percent)) {
		return '';
	}
	
	return percent;
}

function getPrice(matches) {
	return parseFloat(matches[3]);
}