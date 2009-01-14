package org.trieu.client.beans;

import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

import net.ffxml.gwt.json.client.JsonRpc;

import com.google.gwt.json.client.JSONArray;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONParser;
import com.google.gwt.json.client.JSONValue;


public class JsonUtils {
	public static String toString(JSONValue value) {
		if (value.isString() != null)
			return value.isString().stringValue();
		return "";
	}
	public static String toString(String json) {
		return toString(JSONParser.parse(json));
	}

	public static Double toNumber(JSONValue value) {
		if (value.isNumber() != null)
			return value.isNumber().doubleValue();
		return new Double(0);
	}
	public static Double toNumber(String json) {
		return toNumber(JSONParser.parse(json));
	}
	
	
	public static Date toDate(JSONValue value) {
		return new Date(toNumber(value).longValue());
	}
	public static Date toDate(String json) {
		return new Date(toNumber(JSONParser.parse(json)).longValue());
	}

	public static boolean toBoolean(JSONValue value) {
		if (value.isBoolean() != null)
			return value.isBoolean().booleanValue();
		return false;
	}
	public static boolean toBoolean(String json) {
		return toBoolean(JSONParser.parse(json));
	}

	/**
	 * When we use it ??
	 * 
	 * @param value
	 * @return
	 */
	public static String toNull(JSONValue value) {
		if (value.isNull() != null)
			return null;
		return null;
	}

	public static ArrayList<JSONValue> toArray(JSONValue value) {
		ArrayList<JSONValue> arrayList = new ArrayList<JSONValue>();
		if (value.isArray() != null) {
			JSONArray arr = value.isArray();
			for (int i = 0; i < arr.size(); i++) {
				arrayList.add(i, arr.get(i));
			}
			return arrayList;
		}
		return new ArrayList<JSONValue>(0);
	}
	public static ArrayList<JSONValue> toArray(String json) {
		return toArray(JSONParser.parse(json));
	}

	public static JSONObject toObject(String json) {
		JSONObject object = JSONParser.parse(json).isObject();
		if (object != null) {				
			return object;
		}
		return null;
	}
	
	public static JsonRpc JsonRpc()
	{
		return new JsonRpc();
	}

}
