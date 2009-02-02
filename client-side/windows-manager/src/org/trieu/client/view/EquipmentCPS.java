package org.trieu.client.view;

import org.gwm.client.GInternalFrame;

import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.ClickListener;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.FormHandler;
import com.google.gwt.user.client.ui.FormPanel;
import com.google.gwt.user.client.ui.FormSubmitCompleteEvent;
import com.google.gwt.user.client.ui.FormSubmitEvent;
import com.google.gwt.user.client.ui.Label;
import com.google.gwt.user.client.ui.TextArea;
import com.google.gwt.user.client.ui.Widget;

public class EquipmentCPS extends Composite implements FormHandler{
	final FormPanel formPanel = new FormPanel();
	final Label labelResult = new Label("result here");

	public EquipmentCPS(GInternalFrame frame) {
		//super(frame);
		formPanel.addFormHandler(this);
		initWidget(formPanel);
		final AbsolutePanel absolutePanel = new AbsolutePanel();
		absolutePanel.setSize("100%", "100%");
		formPanel.setWidget(absolutePanel);

		final TextArea textBox = new TextArea();
		textBox.setName("myname");

		absolutePanel.add(textBox, 182, 68);

		final Button button = new Button();
		button.addClickListener(new ClickListener() {
			public void onClick(final Widget sender) {
				formPanel.setAction("http://localhost/vehicle/index.php/VehicleModel/test/1234/");
				formPanel.setMethod(FormPanel.METHOD_POST);
				formPanel.submit();
			}
		});
		button.setText("New Button");
		absolutePanel.add(button, 198, 132);


		absolutePanel.add(labelResult, 190, 197);

		this.setSize("800px", "600px");
	}


	public void onSubmit(FormSubmitEvent event) {
		// TODO Auto-generated method stub

	}


	public void onSubmitComplete(FormSubmitCompleteEvent event) {
		String result = event.getResults();
		if(result != null){
			labelResult.setText(result);
		}

	}

}
