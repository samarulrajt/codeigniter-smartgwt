package org.trieu.client;

import org.trieu.client.view.VehicleGoogleMap;

import com.google.gwt.core.client.EntryPoint;
import com.google.gwt.user.client.ui.RootPanel;

public class Test implements EntryPoint {

	public void onModuleLoad() {
		RootPanel rootPanel = RootPanel.get();
		rootPanel.setSize("1024px", "800px");

		final VehicleGoogleMap vehicleGoogleMap = new VehicleGoogleMap();
		rootPanel.add(vehicleGoogleMap, 0, 0);


	}

}
