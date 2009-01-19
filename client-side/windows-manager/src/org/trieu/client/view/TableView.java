package org.trieu.client.view;

import org.gwm.client.GInternalFrame;
import org.trieu.client.WComposite;

import com.smartgwt.client.data.DataSource;
import com.smartgwt.client.widgets.IButton;
import com.smartgwt.client.widgets.Label;
import com.smartgwt.client.widgets.events.ClickEvent;
import com.smartgwt.client.widgets.events.ClickHandler;
import com.smartgwt.client.widgets.form.DynamicForm;
import com.smartgwt.client.widgets.grid.ListGrid;
import com.smartgwt.client.widgets.grid.events.RecordClickEvent;
import com.smartgwt.client.widgets.grid.events.RecordClickHandler;
import com.smartgwt.client.widgets.layout.VLayout;


public class TableView extends WComposite {

	public TableView(GInternalFrame internalFrame) {
		super(internalFrame);
		VLayout layout = new VLayout(15);

		this.initWidget(layout);

		Label label = new Label();
		com.google.gwt.user.client.ui.Label label2 = new com.google.gwt.user.client.ui.Label();
		label.setHeight(10);
		label.setWidth100();
		label.setContents("Showing items in Category 'Rollfix Glue");
	//	layout.addMember(label);

		final DataSource dataSource = ItemSupplyLocalDS.getInstance();

		final DynamicForm form = new DynamicForm();
		form.setIsGroup(true);
		form.setGroupTitle("Update");
		form.setNumCols(4);
		form.setDataSource(dataSource);

		final ListGrid listGrid = new ListGrid();
		listGrid.setSize("100%", "200px");
		listGrid.setDataSource(dataSource);
		listGrid.setAutoFetchData(true);
		listGrid.addRecordClickHandler(new RecordClickHandler() {
			public void onRecordClick(RecordClickEvent event) {
				form.reset();
				form.editSelectedData(listGrid);
			}
		});

		//layout.addMember(listGrid);
		layout.addMember(form);

		IButton button = new IButton("Save");
		button.addClickHandler(new ClickHandler() {
			public void onClick(ClickEvent event) {
				form.saveData();
			}
		});
		layout.addMember(button);

		this.setTitle("Model Vehicle");
		this.setWidth("800px");
		this.setHeight("750px");

	}

}
