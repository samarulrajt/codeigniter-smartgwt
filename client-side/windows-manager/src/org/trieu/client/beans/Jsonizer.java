package org.trieu.client.beans;

import com.google.gwt.json.client.JSONObject;

public interface Jsonizer<T> {
	public String toJson();
	public T fromJson(String json);
}
