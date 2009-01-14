package org.trieu.client;

import com.google.gwt.core.client.EntryPoint;
import com.google.gwt.dom.client.Element;
import com.google.gwt.http.client.Request;
import com.google.gwt.http.client.RequestBuilder;
import com.google.gwt.http.client.RequestCallback;
import com.google.gwt.http.client.RequestException;
import com.google.gwt.http.client.Response;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONParser;
import com.google.gwt.json.client.JSONString;
import com.google.gwt.json.client.JSONValue;
import com.google.gwt.user.client.DOM;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.AbsolutePanel;
import com.google.gwt.user.client.ui.Button;
import com.google.gwt.user.client.ui.ClickListener;
import com.google.gwt.user.client.ui.DeckPanel;
import com.google.gwt.user.client.ui.DialogBox;
import com.google.gwt.user.client.ui.HasHorizontalAlignment;
import com.google.gwt.user.client.ui.KeyboardListenerAdapter;
import com.google.gwt.user.client.ui.Label;
import com.google.gwt.user.client.ui.RootPanel;
import com.google.gwt.user.client.ui.TextArea;
import com.google.gwt.user.client.ui.TextBox;
import com.google.gwt.user.client.ui.VerticalPanel;
import com.google.gwt.user.client.ui.Widget;

/**
 * Entry point classes define <code>onModuleLoad()</code>.
 */
public class TestDialog implements EntryPoint {
	private Button clickMeButton;

	final TextBox textBox = new TextBox();
	final TextBox textBox_1 = new TextBox();
	final TextBox txt_url = new TextBox();

	final TextArea textArea = new TextArea();

	final TextBox objectname = new TextBox();
	final TextBox session = new TextBox();
	final TextBox methodName = new TextBox();
	final TextBox queryString = new TextBox();

	
	public void onModuleLoad() {
		final DeckPanel deck = new DeckPanel();
		final Label label = new Label("Initial Value");
		final TextBox text = new TextBox();

		
		// Wire the widgets
		deck.add(label);
		deck.add(text);
		deck.showWidget(0);

		//
		label.addClickListener(new ClickListener() {
			public void onClick(Widget widget) {
				String value = label.getText();
				text.setText(value);
				deck.showWidget(1);
				text.setFocus(true);
			}
		});

		//
		text.addKeyboardListener(new KeyboardListenerAdapter() {
			public void onKeyPress(Widget widget, char c, int i) {
				if (c == KEY_ENTER) {
					String value = text.getText();
					label.setText(value);
					deck.showWidget(0);
				} else if (c == KEY_ESCAPE) {
					deck.showWidget(0);
				}
			}
		});

		//
		VerticalPanel vp = new VerticalPanel();
		vp.add(deck);
		final RootPanel rootPanel = RootPanel.get("rootdiv");
		rootPanel.add(vp);

		final Button loginButton = new Button();
		loginButton.addClickListener(new ClickListener() {
			public void onClick(final Widget sender) {
				textArea.setText(Encryption.SHA256(textBox_1.getText()));
				login();
			}
		});
		loginButton.setText("Login");
		rootPanel.add(loginButton, 549, 402);

		rootPanel.add(textBox, 50, 132);
		rootPanel.add(textBox_1, 52, 165);

		final Button okButton = new Button();
		okButton.setWidth("109px");
		okButton.addClickListener(new ClickListener() {
			public void onClick(final Widget sender) {
				send();
			}
		});
		okButton.setText("OK");
		rootPanel.add(okButton, 600, 327);

		txt_url.setWidth("655px");
		txt_url.setText("http://localhost/vehicle/index.php");
		rootPanel.add(txt_url, 52, 37);

		rootPanel.add(objectname, 537, 95);
		rootPanel.add(session, 539, 157);
		rootPanel.add(methodName, 537, 210);

		textArea.setSize("363px", "135px");
		rootPanel.add(textArea, 50, 367);

		final Label objectnameLabel = new Label("ObjectName");
		rootPanel.add(objectnameLabel, 425, 100);

		final Label sessionLabel = new Label("Session");
		rootPanel.add(sessionLabel, 427, 155);

		final Label querystringLabel = new Label("methodName");
		rootPanel.add(querystringLabel, 410, 212);

		queryString.setWidth("522px");
		rootPanel.add(queryString, 276, 269);

		final Label querystringLabel_1 = new Label("QueryString");
		querystringLabel_1
				.setHorizontalAlignment(HasHorizontalAlignment.ALIGN_CENTER);
		rootPanel.add(querystringLabel_1, 168, 271);

		PHPRFC4GWT.dispatcherURL = txt_url.getText();
	}

	public static JSONObject jsonizeRFC(String session, String objectName,
			String functionName, JSONObject data) {
		JSONObject rfc = new JSONObject();
		rfc.put("rfc_session", new JSONString(session));
		rfc.put("rfc_object", new JSONString(objectName));
		rfc.put("rfc_method", new JSONString(functionName));
		rfc.put("rfc_data", data);
		return rfc;
	}

	public void login() {
		JSONString username = new JSONString(textBox.getText());
		// secure the password by using SHA256 Hash Algorithm
		JSONString password = new JSONString(Encryption.SHA256(textBox_1.getText()));
		JSONObject o = new JSONObject();
		o.put("username", username);
		o.put("password", password);
		PHPRFC4GWT phprfc4gwt = new PHPRFC4GWT("LoginService");
		phprfc4gwt.sendPostRequest("doLogin", o, new loginHandler());
	}

	void send() {
		PHPRFC4GWT phprfc4gwt = new PHPRFC4GWT(objectname.getText());
		String[] params = queryString.getText().split(",");	
		phprfc4gwt.sendPostRequest(methodName.getText(), params,
				new sendHandler());
	}

	class VehicleModel {
		private String name;

		public VehicleModel() {
		}
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
				session.setText(s);
				Window.alert("Đăng nhập thành công");
			}
		}

	}

	class sendHandler implements RequestCallback {
		public void onError(Request request, Throwable exception) {
		}

		public void onResponseReceived(Request request, Response response) {
			// TODO Auto-generated method stub
			textArea.setText(response.getText());
		}
	}
}
