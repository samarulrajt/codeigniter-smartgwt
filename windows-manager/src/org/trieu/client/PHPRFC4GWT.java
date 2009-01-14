package org.trieu.client;



import com.google.gwt.http.client.RequestBuilder;
import com.google.gwt.http.client.RequestCallback;
import com.google.gwt.http.client.RequestException;
import com.google.gwt.http.client.RequestBuilder.Method;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONString;
import com.google.gwt.user.client.Window;

/**
 * @author Trieu
 * 
 * This class was made to integrate with PHP CodeIgniter Controller
 *
 */
public class PHPRFC4GWT {
	public static String dispatcherURL;	
	public static String session = "@@@";//default 	
	
	private RequestBuilder requestBuilder;
	private String objectName;
	private JSONObject data;
	
	
	public PHPRFC4GWT(String dispatcherURL,String session,String objectName) {
		PHPRFC4GWT.dispatcherURL = dispatcherURL;
		this.objectName = objectName;
		PHPRFC4GWT.session = session;		
	}
	
	public PHPRFC4GWT(String dispatcherURL,String objectName) {
		PHPRFC4GWT.dispatcherURL = dispatcherURL;
		this.objectName = objectName;				
	}
	
	public PHPRFC4GWT(String objectName) {		
		this.objectName = objectName;				
	}
	
	public void sendPostRequest(String methodName,JSONObject data,RequestCallback callback){
		requestBuilder = new RequestBuilder(RequestBuilder.POST, dispatcherURL);
		requestBuilder.setHeader("Content-Type", "application/x-www-form-urlencoded");
		try {
			JSONObject rfc = jsonizeRFC(session,objectName,methodName, data);
			requestBuilder.sendRequest(rfc.toString(), callback);
		} catch (RequestException e) {
			Window.alert(e.getMessage());
		}
	}
	public void sendGetRequest(String methodName,JSONObject data,RequestCallback callback){
		requestBuilder = new RequestBuilder(RequestBuilder.GET, dispatcherURL);
		requestBuilder.setHeader("Content-Type", "application/x-www-form-urlencoded");
		try {
			JSONObject rfc = jsonizeRFC(session,objectName,methodName, data);
			requestBuilder.sendRequest(rfc.toString(), callback);
		} catch (RequestException e) {
			Window.alert(e.getMessage());
		}
	}
	
	
	public void sendPostRequest(String methodName,Object[] params,RequestCallback callback){			
		String queryString = makeQueryString(params);
		requestBuilder = new RequestBuilder(RequestBuilder.POST, dispatcherURL);
		requestBuilder.setHeader("Content-Type", "application/x-www-form-urlencoded");
		try {
			JSONObject rfc = jsonizeRFC(session,objectName,methodName,queryString );
			requestBuilder.sendRequest(rfc.toString(), callback);
		} catch (RequestException e) {
			Window.alert(e.getMessage());
		}
	}	
	public void sendGetRequest(String methodName,Object[] params,RequestCallback callback){
		String queryString = makeQueryString(params);
		requestBuilder = new RequestBuilder(RequestBuilder.GET, dispatcherURL);
		requestBuilder.setHeader("Content-Type", "application/x-www-form-urlencoded");
		try {
			JSONObject rfc = jsonizeRFC(session,objectName,methodName, queryString);
			requestBuilder.sendRequest(rfc.toString(), callback);
		} catch (RequestException e) {
			Window.alert(e.getMessage());
		}
	}
	
	/**
	 * Due to limit of URL, so only pass short text or query string
	 * default the first param is session key
	 * 
	 * @param urlResource
	 * @param callback
	 */
	public void sendGetRequest(String urlResource,RequestCallback callback){		
		requestBuilder = new RequestBuilder(RequestBuilder.GET, dispatcherURL + urlResource);
		requestBuilder.setHeader("Content-Type", "application/x-www-form-urlencoded");
		try {			
			requestBuilder.sendRequest("", callback);
		} catch (RequestException e) {
			Window.alert(e.getMessage());
		}
	}

	
	//TODO : more overload for callMethod here
	
	
	
	


	public String getObjectName() {
		return objectName;
	}

	public void setObjectName(String objectName) {
		this.objectName = objectName;
	}

	public JSONObject getData() {
		return data;
	}

	public void setData(JSONObject data) {
		this.data = data;
	}


	public static JSONObject jsonizeRFC(String session,String objectName,String functionName,JSONObject data) {
		JSONObject rfc = new JSONObject();
		rfc.put("rfc_session", new JSONString(session));
		rfc.put("rfc_object", new JSONString(objectName));
		rfc.put("rfc_method", new JSONString(functionName));
		rfc.put("rfc_data", data);
		return rfc;
	}
	
	public static JSONObject jsonizeRFC(String session,String objectName,String functionName,String queryString) {
		JSONObject rfc = new JSONObject();
		rfc.put("rfc_session", new JSONString(session));
		rfc.put("rfc_object", new JSONString(objectName));
		rfc.put("rfc_method", new JSONString(functionName));
		rfc.put("query_string", new JSONString(queryString));
		return rfc;
	}
	
	protected String makeQueryString(Object[] params) {
		StringBuilder params_string = new StringBuilder();
		params_string.append("/");
		for (Object param : params) {
			params_string.append(param);
			params_string.append("/");
		}
		return params_string.toString();
	}

	public String getDispatcherURL() {
		return dispatcherURL;
	}

	public static String getSession() {
		return session;
	}
}
