let UTIL = {
	numberFormat: function(num) {
		num             = ((typeof num !== 'undefined') && (num !== null))? num : 0;
		num             = num.toString().replace(/\$|\,/g,'');

		if(isNaN(num)){
			num         = "0";
		}

		sign            = (num == (num = Math.abs(num)));
		num             = Math.floor(num*100+0.50000000001);
		cents           = num%100;
		num             = Math.floor(num/100).toString();

		if(cents < 10) {
			cents       = "0" + cents;
		}

		for(let i = 0; i < Math.floor((num.length-(1+i))/3); i++) {

			num = num.substring(0,num.length-(4*i+3))+','+ num.substring(num.length-(4*i+3));

		}

		return (((sign)?'':'-') + num + '.' + cents);
	},
	clearAmount: function(str) {
		return (typeof str =='string') ? str.toString().replace(/\$|\,/g,'') :'';
	},
	imagesName: function (data) {
		let html 	= '',
			image 	= URL.baseUrl() +'assets/template/app/default/assets/images/avatar-4.png';
		html  	+= '<img src="'+ image + '" class="image-dt"> ' +
			'<span class="p-l-5">' + data.full_name +'</span>';

		return html;
	},
	status: function (data) {
		let statusClass = data.class,
			statusName	= data.status_name;
		return '<span class="label label-md badge-' + statusClass + '">' + statusName + '</span>';
	},
	statusName: function (data) {
		let statusClass = (data.statusId == 1) ? 'primary' : '',
			statusName	= (data.statusId == 1) ? 'Activo' : 'Inactivo';
		return '<span class="label label-md badge-' + statusClass + '">' + statusName + '</span>';
	},
};
