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

import com.google.gwt.json.client.JSONNull;
import com.google.gwt.json.client.JSONNumber;
import com.google.gwt.json.client.JSONValue;

/**
 * Reads and writes int values.
 * 
 * @author Miroslav Pokorny
 * @author Vincente Ferrer
 */
public class IntJsonSerializer extends JsonSerializer {
	public final static IntJsonSerializer serializer = new IntJsonSerializer();

	private IntJsonSerializer() {
		super();
	}

	@Override
	public Object readObject(final JSONValue jsonValue) {
		return new Integer(this.read(jsonValue));
	}

	@Override
	public JSONValue writeJson(final Object instance) {
		final Integer wrapper = (Integer) instance;
		return wrapper == null ? (JSONValue) JSONNull.getInstance() : new JSONNumber(wrapper.intValue());
	}

	public int read(final JSONValue jsonValue) {
		return (int) this.readDouble(jsonValue);
	}

	public JSONValue writeJson(final int intValue) {
		return new JSONNumber(intValue);
	}
}
