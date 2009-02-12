package org.trieu.client.view;

import org.gwm.client.GInternalFrame;

import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.FormPanel;
import com.google.gwt.user.client.ui.HTML;
import com.google.gwt.user.client.ui.Label;
import com.google.gwt.user.client.ui.ListBox;
import com.google.gwt.user.client.ui.RadioButton;
import com.google.gwt.user.client.ui.TextBox;

public class CreateVehicleCPS extends Composite {
	final AbsolutePanel absolutePanel = new AbsolutePanel();
	final AbsolutePanel absolutePanelHD = new AbsolutePanel();

	public CreateVehicleCPS(GInternalFrame internalFrame) {
		//super(internalFrame);
		absolutePanel.setSize("100%", "100%");
		absolutePanel.setSize("100%", "100%");

		final FormPanel formPanel = new FormPanel();
		formPanel.setMethod(FormPanel.METHOD_POST);
		initWidget(formPanel);


		//final TabPanel tp = new TabPanel();
		//tp.setSize("100%", "100%");
		formPanel.setWidget(absolutePanel);


		//tp.add(absolutePanel, "Thông tin xe");
		//tp.add(absolutePanelHD, "Hop dong thue xe");
		//tp.selectTab(0);
		// formPanel.setWidget(absolutePanelHD);

		final Label label_17 = new Label("New Label");
		absolutePanelHD.add(label_17, 47, 32);

		final TextBox textBox_14 = new TextBox();
		absolutePanelHD.add(textBox_14, 128, 72);

		final Label label_18 = new Label("Loại hợp đồng");
		absolutePanelHD.add(label_18, 11, 66);

		final Label label_22 = new Label("Thời gian");
		label_22.setSize("68px", "17px");
		absolutePanelHD.add(label_22, 47, 99);

		final TextBox textBox_15 = new TextBox();
		textBox_15.setSize("146px", "22px");
		absolutePanelHD.add(textBox_15, 128, 99);

		final Label label_23 = new Label("New Label");
		label_23.setSize("68px", "17px");
		absolutePanelHD.add(label_23, 47, 126);

		final TextBox textBox_19 = new TextBox();
		textBox_19.setSize("146px", "22px");
		absolutePanelHD.add(textBox_19, 128, 126);

		final Label label_24 = new Label("New Label");
		label_24.setSize("68px", "17px");
		absolutePanelHD.add(label_24, 47, 153);

		final TextBox textBox_20 = new TextBox();
		textBox_20.setSize("146px", "22px");
		absolutePanelHD.add(textBox_20, 128, 153);

		final Label label_25 = new Label("New Label");
		label_25.setSize("68px", "17px");
		absolutePanelHD.add(label_25, 47, 180);

		final TextBox textBox_21 = new TextBox();
		textBox_21.setSize("146px", "22px");
		absolutePanelHD.add(textBox_21, 128, 180);

		final Button button = new Button();
		button.setText("Huỷ lệnh");
		absolutePanel.add(button, 547, 493);

		final Button button_1 = new Button();
		button_1.setText("Thông tin hợp đồng");
		absolutePanel.add(button_1, 676, 493);

		final Label label = new Label("Số đăng ký xe");
		absolutePanel.add(label, 21, 18);

		final TextBox textBox = new TextBox();
		absolutePanel.add(textBox, 124, 18);

		final Label modelLabel = new Label("Model");
		modelLabel.setSize("68px", "17px");
		absolutePanel.add(modelLabel, 420, 18);

		final ListBox listBox = new ListBox();
		listBox.setWidth("244px");
		absolutePanel.add(listBox, 474, 13);

		final HTML html = new HTML("<hr>");
		absolutePanel.add(html, 0, 48);

		final Label label_2 = new Label("Loại xe");
		absolutePanel.add(label_2, 21, 85);

		final Label ptacLabel = new Label("PTAC");
		ptacLabel.setSize("68px", "17px");
		absolutePanel.add(ptacLabel, 21, 128);

		final Label label_4 = new Label("Kiểu xe");
		label_4.setSize("68px", "17px");
		absolutePanel.add(label_4, 21, 168);

		final Label label_5 = new Label("Nhãn hiệu");
		label_5.setSize("68px", "17px");
		absolutePanel.add(label_5, 251, 85);

		final Label label_6 = new Label("Mã số thuế");
		label_6.setSize("46px", "17px");
		absolutePanel.add(label_6, 487, 85);

		final Label label_7 = new Label("Nhiên liệu");
		label_7.setSize("68px", "17px");
		absolutePanel.add(label_7, 693, 85);

		final TextBox textBox_1 = new TextBox();
		textBox_1.setWidth("119px");
		absolutePanel.add(textBox_1, 108, 85);

		final TextBox textBox_2 = new TextBox();
		textBox_2.setSize("119px", "22px");
		absolutePanel.add(textBox_2, 108, 123);

		final TextBox textBox_3 = new TextBox();
		textBox_3.setSize("119px", "22px");
		absolutePanel.add(textBox_3, 108, 168);

		final TextBox textBox_4 = new TextBox();
		textBox_4.setSize("119px", "22px");
		absolutePanel.add(textBox_4, 327, 85);

		final TextBox textBox_5 = new TextBox();
		textBox_5.setSize("119px", "22px");
		absolutePanel.add(textBox_5, 547, 85);

		final TextBox textBox_6 = new TextBox();
		textBox_6.setSize("119px", "22px");
		absolutePanel.add(textBox_6, 766, 85);

		final TextBox textBox_7 = new TextBox();
		textBox_7.setSize("119px", "22px");
		absolutePanel.add(textBox_7, 327, 123);

		final TextBox textBox_8 = new TextBox();
		textBox_8.setSize("119px", "22px");
		absolutePanel.add(textBox_8, 327, 163);

		final TextBox textBox_9 = new TextBox();
		textBox_9.setSize("119px", "22px");
		absolutePanel.add(textBox_9, 547, 123);

		final TextBox textBox_10 = new TextBox();
		textBox_10.setSize("87px", "22px");
		absolutePanel.add(textBox_10, 798, 128);

		final Label label_8 = new Label("Trọng tải");
		label_8.setSize("68px", "17px");
		absolutePanel.add(label_8, 251, 128);

		final Label label_9 = new Label("Số sườn");
		label_9.setSize("68px", "17px");
		absolutePanel.add(label_9, 251, 168);

		final Label label_10 = new Label("Thể tích");
		label_10.setSize("68px", "17px");
		absolutePanel.add(label_10, 474, 128);

		final Label label_11 = new Label("Km đã đi");
		label_11.setSize("100px", "17px");
		absolutePanel.add(label_11, 487, 168);

		final TextBox textBox_11 = new TextBox();
		textBox_11.setSize("119px", "22px");
		absolutePanel.add(textBox_11, 592, 168);

		final HTML html_1 = new HTML("<hr>");
		absolutePanel.add(html_1, -11, 202);

		final Label label_12 = new Label("Thiết bị");
		label_12.setSize("68px", "17px");
		absolutePanel.add(label_12, 21, 223);

		final Label label_3 = new Label("Diện tích sàn");
		absolutePanel.add(label_3, 708, 128);

		final ListBox listBox_1 = new ListBox();
		listBox_1.setSelectedIndex(-1);
		listBox_1.setMultipleSelect(true);
		listBox_1.addItem("GPS bluetooth");
		listBox_1.addItem("Satelite phone");
		listBox_1.addItem("Test", "ets");
		listBox_1.setSize("305px", "57px");
		listBox_1.setVisibleItemCount(5);
		absolutePanel.add(listBox_1, 108, 223);

		final HTML html_2 = new HTML("<hr>");
		absolutePanel.add(html_2, 0, 285);

		final Label label_1 = new Label("Thông tin chi nhánh");
		absolutePanel.add(label_1, 21, 308);

		final Label label_13 = new Label("Chi nhánh quản lý");
		absolutePanel.add(label_13, 52, 346);

		final ListBox listBox_2 = new ListBox();
		listBox_2.addItem("Chi nhánh TPHCM");
		listBox_2.addItem("Chi nhánh Bình Dương");
		listBox_2.setWidth("251px");
		absolutePanel.add(listBox_2, 173, 346);

		final Label label_14 = new Label("Chi nhánh cho mượn");
		label_14.setSize("147px", "17px");
		absolutePanel.add(label_14, 21, 380);

		final ListBox listBox_3 = new ListBox();
		listBox_3.setSize("251px", "22px");
		absolutePanel.add(listBox_3, 173, 380);

		final Label label_15 = new Label("Hợp đồng số");
		label_15.setSize("91px", "17px");
		absolutePanel.add(label_15, 451, 346);

		final TextBox textBox_12 = new TextBox();
		textBox_12.setSize("119px", "22px");
		absolutePanel.add(textBox_12, 542, 346);

		final RadioButton radioButton = new RadioButton("thoigianthuexe");
		radioButton.setText("Loại ngắn hạn");
		absolutePanel.add(radioButton, 705, 328);

		final RadioButton radioButton_1 = new RadioButton("thoigianthuexe");
		radioButton_1.setText("Loại dài hạn");
		absolutePanel.add(radioButton_1, 705, 355);

		final Label label_16 = new Label("Tiếp quản");
		label_16.setSize("68px", "17px");
		absolutePanel.add(label_16, 21, 415);

		final TextBox textBox_13 = new TextBox();
		textBox_13.setSize("119px", "22px");
		absolutePanel.add(textBox_13, 108, 415);

		final Label label_19 = new Label("Thẻ xăng");
		label_19.setSize("68px", "17px");
		absolutePanel.add(label_19, 21, 449);

		final TextBox textBox_16 = new TextBox();
		textBox_16.setSize("119px", "22px");
		absolutePanel.add(textBox_16, 108, 449);

		final Label label_20 = new Label("Số PIN");
		label_20.setSize("68px", "17px");
		absolutePanel.add(label_20, 271, 449);

		final TextBox textBox_17 = new TextBox();
		textBox_17.setSize("119px", "22px");
		absolutePanel.add(textBox_17, 358, 449);

		final Label label_21 = new Label("Mã số lái xe");
		label_21.setSize("87px", "17px");
		absolutePanel.add(label_21, 500, 449);

		final TextBox textBox_18 = new TextBox();
		textBox_18.setSize("119px", "22px");
		absolutePanel.add(textBox_18, 587, 449);
		setSize("950px", "700px");
	}

	private void $(String string) {
		// TODO Auto-generated method stub

	}

}
