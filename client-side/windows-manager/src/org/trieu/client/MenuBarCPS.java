package org.trieu.client;

import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

import net.ffxml.gwt.json.client.JsonRpc;

import org.gwm.client.GDesktopPane;
import org.gwm.client.GInternalFrame;
import org.gwm.client.impl.DefaultGInternalFrame;
import org.trieu.client.beans.ThesisChiNhanh;
import org.trieu.client.beans.ThesisModelXe;
import org.trieu.client.beans.ThesisThietBi;
import org.trieu.client.beans.ThesisXe;
import org.trieu.client.view.ThesisModelXeCPS;

import com.google.gwt.user.client.Command;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.MenuBar;
import com.google.gwt.user.client.ui.MenuItem;

public class MenuBarCPS extends Composite {

	private GDesktopPane desktop;

	public GDesktopPane getDesktop() {
		return desktop;
	}

	public void setDesktop(GDesktopPane desktop) {
		if(desktop != null){
			this.desktop = desktop;
		}
	}

	public MenuBarCPS(GDesktopPane desktop) {
		this.desktop = desktop;

		final MenuBar menuBar = new MenuBar();
		menuBar.setStyleName("gwt-MenuBar");
		initWidget(menuBar);

		final MenuBar menuBarSystem = new MenuBar(true);

		final MenuItem menuItem = menuBarSystem.addItem("Đăng nhập",
				new Command() {
					public void execute() {
						loginWindow();
					}
				});
		menuItem.setStyleName("gwt-MenuItem");

		menuBarSystem.addItem("Đăng xuất", (Command) null);

		menuBarSystem.addItem("<hr>", true, (Command) null);

		menuBarSystem.addItem("Thoát phiên làm việc", (Command) null);

		final MenuItem menuItemSystem = menuBar.addItem("Hệ thống",
				menuBarSystem);
		menuItemSystem.setStyleName("gwt-MenuItem");

		final MenuBar menuBar_2 = new MenuBar(true);

		menuBar_2.addItem("Nhập Model Xe", new Command() {
			public void execute() {
				ThesisModelXeWindow();
			}
		});

		menuBar.addItem("<hr>", true, (Command)null);

		menuBar.addItem("Quản lý Model Xe", menuBar_2);

		menuBar_2.addItem("Tìm Model Xe", new Command() {
			public void execute() {

				ThesisThietBi thietBi = new ThesisThietBi();
				thietBi.setId(1001);
				thietBi.setMsThietBi("uwuq");
				thietBi.setTenThietBi("GPS Bluetooth Receiver");
				thietBi.setLoaiThietBi("Hand held device");
				
				ThesisChiNhanh chiNhanh = new ThesisChiNhanh();
				chiNhanh.msChiNhanh = "CN1";
				chiNhanh.tenChiNhanh = "Chi nhanh so 1";
				
				Map map = new HashMap();
				map.put("msChiNhanh", chiNhanh.msChiNhanh);
				ArrayList<Long> list = new ArrayList<Long>();
				list.add(1001L);
				list.add(1002L);
				list.add(1004L);
				
				map.put("tenChiNhanh", list);
				
				JsonRpc rpc = new JsonRpc();
				
				
				ThesisXe xe = new ThesisXe();
				xe.setMsThietBi("GP1");
				xe.setId(100l);
				xe.setNgayCapNhat(new Date());
				xe.setSoDangKyXe("3775-KA");



				ThesisModelXe modelXe = new ThesisModelXe();
				modelXe.setMsModelXe("4545KA");
				
				Window.alert(modelXe.toJson());


			}
		});

		setStyleName("gwt-MenuBar");
		String width = Window.getClientWidth()+"";//get the user's width screen
		setSize("100%", "27");
	}



	public void loginWindow() {
		GInternalFrame win = new DefaultGInternalFrame("Đăng nhập hệ thống");
		Composite com = new LoginCPS(win);
		win.setContent(com);
		win.setSize(com.getOffsetWidth(), com.getOffsetHeight());
		win.setResizable(false);
		win.setMinimizable(false);
		win.setMaximizable(false);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	
	public void ThesisModelXeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Nhập model xe");
		Composite com = new ThesisModelXeCPS(win);
		win.setContent(com);
		win.setSize(com.getOffsetWidth(), com.getOffsetHeight());
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}



}
