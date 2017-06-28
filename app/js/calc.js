(function() {
	var form = document.querySelector('.form-calc-ipoteka');
	var total = form.querySelector('#js-total').value;
	var first = form.querySelector('#js-first').value;
	var time = form.querySelector('#js-time').value;
	var total_credit = form.querySelector('#js-total-credit');
	var monthly = form.querySelector('#js-monthly');
	var procent = parseFloat(form.querySelector('#js-procent').value);
	procent = procent / 100;
	Calc();

	function trimAll(s)
	// убирает все пробелы в строке s
	{
 		 var r=/\s+/g;
  		return s.replace(r,'');
	}

	function NumberDigits(input) {
		var str = trimAll(input.value.toString(10));
		input.value = str.replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1 ");
	}





	function Calc() {
		var str;
		str = form.querySelector('#js-total').value.toString(10);		
		total = parseInt(trimAll(str));
		str = form.querySelector('#js-first').value.toString(10);
		first = parseInt(trimAll(str));
		time = form.querySelector('#js-time').value;
		str = (total - first).toString(10);
		total_credit.innerText = str.replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1 ");
		var x = (total - first) * procent / 12;
		var y = 1 - 1 / Math.pow((1 + procent / 12), time * 12);
		var m = Math.round(x / y);
		//var m =  Math.round((total - first) * procent / 12 - Math.pow((procent / 12), (time * 12)));
		//Math.pow(m, time * 12);
		str = m.toString(10);
		monthly.innerText = str.replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1 ");
	}

	form.querySelector('#js-total').addEventListener('input', function() {
		NumberDigits(this);
		Calc();
	});
	form.querySelector('#js-first').addEventListener('input', function() {
		NumberDigits(this);
		Calc();
	});
	form.querySelector('#js-time').addEventListener('input', function() {
		//if (this.value > 30) this.value = 30;
		if (this.value <= 3) this.value = 3;
		Calc();
	});

})();