package org.trieu.client.view;

import com.google.gwt.maps.client.InfoWindow;
import com.google.gwt.maps.client.InfoWindowContent;
import com.google.gwt.maps.client.MapType;
import com.google.gwt.maps.client.MapWidget;
import com.google.gwt.maps.client.control.MapTypeControl;
import com.google.gwt.maps.client.control.SmallMapControl;
import com.google.gwt.maps.client.event.MarkerDragEndHandler;
import com.google.gwt.maps.client.event.MarkerDragStartHandler;
import com.google.gwt.maps.client.geom.LatLng;
import com.google.gwt.maps.client.overlay.Marker;
import com.google.gwt.maps.client.overlay.MarkerOptions;
import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.Label;
import com.google.gwt.user.client.ui.MultiWordSuggestOracle;
import com.google.gwt.user.client.ui.SuggestBox;

public class VehicleGoogleMap extends Composite {

	MultiWordSuggestOracle createCountriesOracle()
	{
	    MultiWordSuggestOracle oracle = new MultiWordSuggestOracle();

	    oracle.add("Afghanistan");
	    oracle.add("Albania");
	    oracle.add("Algeria");
	    oracle.add("American Samoa");
	    oracle.add("Andorra");
	    oracle.add("Angola");
	    oracle.add("Anguilla");
	    oracle.add("Antarctica");
	    oracle.add("Antigua And Barbuda");
	    oracle.add("Argentina");
		return oracle;
	}




	public VehicleGoogleMap() {




		final AbsolutePanel absolutePanel = new AbsolutePanel();
		initWidget(absolutePanel);


		final SuggestBox suggestBox = new SuggestBox(createCountriesOracle());
		suggestBox.setAnimationEnabled(true);


		absolutePanel.add(suggestBox, 577, 61);

		final Label maSoXeLabel = new Label("Ma so xe");
		absolutePanel.add(maSoXeLabel, 503, 61);
		setSize("850px", "750px");

	}


	private static MapWidget map;
	protected static MapWidget getMap() {
		map = new MapWidget(LatLng.newInstance(10.75340,106.62900), 18);
	    map.addControl(new SmallMapControl());
	    map.addControl(new MapTypeControl());
	    map.setCurrentMapType(MapType.getSatelliteMap());
		map.setSize("570px", "430px");
		map.clearOverlays();


		MarkerOptions options = MarkerOptions.newInstance();
		options.setDraggable(true);
		final Marker marker = new Marker(map.getCenter(), options);
		final InfoWindow info = map.getInfoWindow();

		marker.addMarkerDragEndHandler(new MarkerDragEndHandler() {
			public void onDragEnd(MarkerDragEndEvent event) {
				info.open(marker, new InfoWindowContent("Just bouncing along..."));
			}
		});

		marker.addMarkerDragStartHandler(new MarkerDragStartHandler() {
			public void onDragStart(MarkerDragStartEvent event) {
				info.setVisible(false);
			}
		});

		map.addOverlay(marker);

		return map;
	}


}
