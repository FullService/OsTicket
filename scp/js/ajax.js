/* 
    Peter
    Simple httprequest wrapper. It will be replaced by an ajax framework in the future.
  
    Based on Wrapper by http://adamv.com/dev/javascript/http_request
*/

var Http = {
	ReadyState: {
		Uninitialized: 0,
		Loading: 1,
		Loaded:2,
		Interactive:3,
		Complete: 4
	},
		
	Status: {
		OK: 200,
		
		Created: 201,
		Accepted: 202,
		NoContent: 204,
		
		BadRequest: 400,
		Forbidden: 403,
		NotFound: 404,
		Gone: 410,
		
		ServerError: 500
	},
		
	Method: {Get: "GET", Post: "POST"},
	
	enabled: false,
	req: null,
	
	Init: function(){

        if (window.XMLHttpRequest) {
            Http.req = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) {
            Http.req = new ActiveXObject("Microsoft.XMLHTTP");
        }

		Http.enabled = (Http.req != null);
	},
	get: function(params, callback_args){	
		
        if (!Http.enabled) throw "Http: XmlHttpRequest not available.";
		
		var url = params.url;
		if (!url) throw "Http: A URL must be specified";
				
		var method = params.method || Http.Method.Get;
		var callback = params.callback;
		
		// Only one request at a time, please
		if ((Http.req.readyState != Http.ReadyState.Uninitialized) && 
			(Http.req.readyState != Http.ReadyState.Complete)){
			this.req.abort();
			
		}
		
		Http.req.open(method, url, true);

		Http.req.onreadystatechange =  function() {
			if (Http.req.readyState != Http.ReadyState.Complete) return;
			
			if (callback_args == null) callback_args = new Array();

			var cb_params = new Array();
			cb_params.push(Http.req);
			for(var i=0;i<callback_args.length;i++)
				cb_params.push(callback_args[i]);
				
			callback.apply(null, cb_params);
		};
		
		Http.req.send(params.body || null);
	}
	
};
Http.Init();
