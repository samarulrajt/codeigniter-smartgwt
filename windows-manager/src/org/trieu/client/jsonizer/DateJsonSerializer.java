/*
 * Copyright Miroslav Pokorny
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
package org.trieu.client.jsonizer;

import java.util.Date;

import com.google.gwt.json.client.JSONNull;
import com.google.gwt.json.client.JSONNumber;
import com.google.gwt.json.client.JSONValue;

/**
 * Reads and writes date values.
 * 
 * @author Miroslav Pokorny
 * @author Vincente Ferrer
 */
public class DateJsonSerializer extends JsonSerializer {
	public final static DateJsonSerializer serializer = new DateJsonSerializer();

	private DateJsonSerializer() {
		super();
	}

	@Override
	public Object readObject(final JSONValue jsonValue) {
		final long time = (long) this.readDouble(jsonValue);
		return new Date(time);
	}

	@Override
	public JSONValue writeJson(final Object instance) {
		final Date date = (Date) instance;
		return null == date ? (JSONValue) JSONNull.getInstance() : new JSONNumber(date.getTime());
	}
}
