let DOM = {
    setSingleAlert: function (data) {
        swal({
            type				: data.type,
            title				: data.title,
            text				: data.text,
			confirmButtonColor 	: '#1abc9c'
        });
    },
    getAppend: function(data, callBack) {
		DOM.ajaxRequest(data).done(function(r) {
            let response = JSON.parse(r);
			DOM.resultHandler(data, response, callBack);
        });
    },
    submit: function (data, callBack, errorCallBack) {
		DOM.ajaxRequest(data).done(function(r) {
            let response = JSON.parse(r);
			DOM.resultHandler(data, response, callBack, errorCallBack);
        });
    },
	submitData: function (data, callBack, errorCallBack) {
		DOM.ajaxRequestEnctype(data, function (r) {
			let response = JSON.parse(r);
			DOM.resultHandler(data, response, callBack, errorCallBack);
		});
	},
	setRequestAlert: function (data, callBack) {
		let title   			= (typeof data.title === "undefined") ? 'Atención' : data.title,
			text    			= (typeof data.text === "undefined") ? '¿Esta seguro que desea eliminar este registro?' : data.text,
			type    			= (typeof data.type === "undefined") ? 'warning' : data.type,
			confirmButtonColor 	= (typeof data.confirmButtonColor === "undefined") ? '#1abc9c' : data.confirmButtonColor,
			cancelButtonColor 	= (typeof data.cancelButtonColor === "undefined") ? '#bdc3c7' : data.cancelButtonColor,
			confirmButtonText 	= (typeof data.confirmButtonText === "undefined") ? "Si, eliminar!" : data.confirmButtonText;

		swal({
			title				: title,
			text				: text,
			type				: type,
			showCancelButton	: true,
			confirmButtonColor	: confirmButtonColor,
			cancelButtonColor	: cancelButtonColor,
			cancelButtonText	: 'Cancelar',
			confirmButtonText	: confirmButtonText,
			reverseButtons		: true
		}).then((result) => {
			if(result.value) {
				if(data.isCancel === true) {
					window.location = URL.baseUrl() + data.returnUrl;
				} else {
					DOM.ajaxRequest(data).done(function (r) {
						let response = JSON.parse(r);
						if (response.result !== 0) {
							DOM.domHandler(data, response, callBack);
						} else {
							let alert = {
								type	: "error",
								title	: "No se puede ejecutar la operacion",
								text	: "Por el momento no se puede ejecutar esta operacion, si el problema continua contacte con su proveedor"
							};
							DOM.setSingleAlert(alert);
						}
					});
				}
			}
		});
	},
    getValue: function(data) {
        let response = DOM.ajaxRequestSync(data);

        if(response.result !== 0) {
            if(data.action === 'undefined') data.action = '';
            switch (data.action) {
                case 'return':
                    return response;
                    break;
                default:
                    (typeof data.selector === 'undefined') ? data.selector2.val(response.result) : $(data.selector).val(response.result);
                    break;
            }
        }
    },
    getAppendMultiple: function(data, callBack) {
		DOM.ajaxRequest(data).done(function(r) {
            let response = (typeof data.type === "undefined") ? data : JSON.parse(r);

            if(response.result !== 0) {
                for(let element in response.result) {
                    $(element).html(response.result[element]);
                }

                if(callBack) {
                    callBack();
                }
            }
        });
    },
    resultHandler: function(data, response, callBack, errorCallBack){
        if (response.result !== 0) {
			DOM.domHandler(data, response, callBack);
        } else {
            Ladda.stopAll();
            let messageError = (typeof data.messageError === 'undefined') ? '.response' : data.messageError;
            $(messageError).html(response.error);
            $('html, body').animate({scrollTop:0}, 100, 'linear');

            setTimeout(function() {
            	$('.saving').css('background-color', '#d9534f').fadeOut(1500);
            }, 1000);

            if(errorCallBack) {
                errorCallBack(response);
            }
        }
    },
    domHandler: function (data, response, callBack) {
        let selector = $(data.selector);
        switch (data.doAfter) {
            case "login":
                window.location = response.url;
                break;

            case "redirect":
                if(data.samePage == true) {
                    location.reload(true);
                }else{
                    let url = (typeof response.url === "undefined") ? data.returnUrl : response.url;
                    if (typeof data.showAlert !== "undefined" && data.showAlert == true) {
						DOM.setSingleAlert({type: "success", title: data.titleResponse, text: data.textResponse});
                    }
                    window.location = url;
                }
                break;

            case "append":
                selector.append(response.view);
                break;

            case "prepend":
                selector.prepend(response.view);
                break;

            case 'before':
                selector.before(response.result);
                break;

            case 'insertAfter':
                selector.after(response.result);
                break;

            case "remove":
                selector.remove();
                break;

            case "html":
                selector.html(response.view);
                if(typeof response.mod !== "undefined"){
                    let dataMod = {result : response.mod};
                    DOM.getAppendMultiple(dataMod);
                }
                break;

            case "calendar":
                selector.fullCalendar('refetchEvents');
                selector.fullCalendar('rerenderEvents');
                selector.fullCalendar('refetchResources');
                $('.popover').popover('hide');
                break;

            case "datatable":
                if (data.showAlert == true) {
					DOM.closeModal(data.modal);
					DOM.setSingleAlert({type: "success", title: data.titleResponse, text: data.textResponse});
					selector.DataTable().ajax.reload();
                }else{
					DOM.closeModal(data.modal);
					selector.DataTable().ajax.reload();
				}
                break;

			case "datatable-import":
				DOM.closeModal(data.modal);
				selector.DataTable().ajax.reload();
				Swal.fire({
					title				: "Exito!",
					html				: response.processed+' datos procesados. <br>' + response.success+' datos registrados. <br>' + +response.skip+' datos ignorados.',
					confirmButtonText	: "Ok",
				});
				break;

            case "datatable-reload":
				selector.DataTable().ajax.reload();
                break;

            case "showAlert":
				DOM.closeModal(data.modal);
				DOM.setSingleAlert({type: "success", title: data.titleResponse, text: data.textResponse});
                break;

			case "hideModal":
				DOM.closeModal(data.modal);
				break;

            case "changePassword":
                swal({
                    title				: "",
                    text				: 'Contraseña reestablecida correctamente. Sera reedirigido a la pantalla inicial en unos momentos.',
                    type				: "success",
                    showConfirmButton	: false,
                    timer				: 3000
                }).then(function () {
                    window.location = URL.baseUrl();
                });
                break;

            default:
                selector.html(response.result);
        }

        if(typeof data.modal !== 'undefined') {
			DOM.closeModal(data.modal);
		}

        // Handle any callback function that was sent
        if(typeof callBack !== "undefined") {
            callBack();
        }
    },
	ajaxRequest: function(r) {
		let params = (r.type == "post") ? $(r.form).serialize() : false;
		return $.ajax({type: r.type, url: r.url, data: params});
	},
    ajaxRequestSync: function (r) {
        let params 		= false,
            response 	= 0;

        if(r.type == "post") {
            params = $(r.form).serialize();
        }

        $.ajax({
            async	: false,
            type	: r.type,
            url		: r.url,
            data	: params,
            success: function(data){
                response = data;
            },
            error: function(){
                response = {
                    result	: false,
                    error	: '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation-triangle"></i><h3>Advertencia:</h3><p>Hubo problemas en el administrador</p></div>'
                };
            }
        });

        return JSON.parse(response);
    },
	ajaxRequestEnctype: function (data, success) {
		$(data.form).ajaxSubmit({success: success});
	},
	closeModal: function (modal) {
    	if(typeof modal !== 'undefined'){
			$(modal).modal('hide');
			$(modal).html('');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
		}
	}
};

let URL = {
    baseUrl: function(){
        let host = location.hostname + '/',
            path = location.protocol + '//' +location.hostname + '/';

        if(host == 'localhost/') {
            path += "schoolapp_v1/";
        }

        return path;
    },
};
