package org.trieu.client;

import org.gwm.client.GInternalFrame;
import org.trieu.client.TestDialog.loginHandler;

import com.google.gwt.http.client.Request;
import com.google.gwt.http.client.RequestCallback;
import com.google.gwt.http.client.Response;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONParser;
import com.google.gwt.json.client.JSONString;
import com.google.gwt.json.client.JSONValue;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.ClickListener;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.Label;
import com.google.gwt.user.client.ui.PasswordTextBox;
import com.google.gwt.user.client.ui.TextBox;
import com.google.gwt.user.client.ui.Widget;

public class LoginCPS extends BaseComposite {

	final TextBox txtUsername = new TextBox();
	final PasswordTextBox passwordTextBox = new PasswordTextBox();
	
	
	public LoginCPS(GInternalFrame internalFrame) {
		super(internalFrame);

		final AbsolutePanel absolutePanel = new AbsolutePanel();
		absolutePanel.setSize("490", "230");
		initWidget(absolutePanel);
		
		absolutePanel.add(txtUsername, 225, 48);
		

		final Button buttonOK = new Button();
		buttonOK.setWidth("91px");
		buttonOK.addClickListener(new ClickListener() {
			public void onClick(final Widget sender) {
				login();
			}
		});
		buttonOK.setText("Đồng ý");
		absolutePanel.add(buttonOK, 223, 156);

		final Button buttonCancel = new Button();
		buttonCancel.setWidth("78px");
		buttonCancel.setText("Huỷ");
		absolutePanel.add(buttonCancel, 319, 156);

		final Label label = new Label("Tên đăng nhập");
		absolutePanel.add(label, 87, 48);

		final Label label_1 = new Label("Mật khẩu");
		absolutePanel.add(label_1, 87, 108);

		
		absolutePanel.add(passwordTextBox, 225, 105);
	}
	
	private void login() {
		JSONString username = new JSONString(txtUsername.getText());
		JSONValue password = new JSONString(Encryption.SHA256(passwordTextBox.getText()));
		// secure the password by using SHA256 Hash Algorithm
		JSONObject o = new JSONObject();
		o.put("username", username);		
		o.put("password", password);
		PHPRFC4GWT phprfc4gwt = new PHPRFC4GWT("LoginService");
		phprfc4gwt.sendPostRequest("doLogin", o, new loginHandler());
	}
	
	class loginHandler implements RequestCallback {
		public void onError(Request request, Throwable exception) {
			Window.alert("Lỗi đăng nhập!");
		}
		public void onResponseReceived(Request request, Response response) {
			String s = JSONParser.parse(response.getText()).isObject().get(
					"session").isString().stringValue();
			if (s.equals("@@@"))
				Window.alert("Đăng nhập KHÔNG thành công");
			else {
				PHPRFC4GWT.session = s;			
				Window.alert("Đăng nhập thành công");
				LoginCPS.this.getInternalFrame().close();
			}
		}
	}

}
