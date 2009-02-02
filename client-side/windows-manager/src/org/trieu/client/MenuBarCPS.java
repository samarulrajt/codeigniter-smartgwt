package org.trieu.client;

import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

import net.ffxml.gwt.json.client.JsonRpc;

import org.gwm.client.GDesktopPane;
import org.gwm.client.GInternalFrame;
import org.gwm.client.impl.DefaultGInternalFrame;
import org.trieu.client.model.ThesisChiNhanh;
import org.trieu.client.model.ThesisModelXe;
import org.trieu.client.model.ThesisThietBi;
import org.trieu.client.model.ThesisXe;
import org.trieu.client.view.EquipmentCPS;

import com.google.gwt.user.client.Command;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.MenuBar;
import com.google.gwt.user.client.ui.MenuItem;

public class MenuBarCPS extends Composite {

	private GDesktopPane desktop;
	final MenuBar menuBar = new MenuBar();
	final MenuBar menuBar_2 = new MenuBar(true);

	public GDesktopPane getDesktop() {
		return desktop;
	}

	public void setDesktop(GDesktopPane desktop) {
		if (desktop != null) {
			this.desktop = desktop;
		}
	}

	public MenuBarCPS(GDesktopPane desktop) {
		this.desktop = desktop;

		menuBar.setStyleName("gwt-MenuBar");
		initWidget(menuBar);

		final MenuBar menuBarSystem = new MenuBar(true);

		final MenuItem menuItem = menuBarSystem.addItem("Đăng nhập", new Command() {
			public void execute() {
				loginWindow();
			}
		});
		menuItem.setStyleName("gwt-MenuItem");

		menuBarSystem.addItem("Đăng xuất", (Command) null);

		menuBarSystem.addItem("<hr>", true, (Command) null);

		menuBarSystem.addItem("Thoát phiên làm việc", (Command) null);

		final MenuItem menuItemSystem = menuBar.addItem("Hệ thống", menuBarSystem);
		menuItemSystem.setStyleName("gwt-MenuItem");

//		menuBar_2.addItem("Nhập Model Xe", new Command() {
//			public void execute() {
//				ThesisModelXeWindow();
//			}
//		});

		initMenu() ;


		menuBar.addItem("<hr>", true, (Command) null);

		menuBar.addItem("Quản lý nghiep vu ", menuBar_2);

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
		String width = Window.getClientWidth() + "";// get the user's width
													// screen
		setSize("100%", "27");
	}

	void initMenu() {

		menuBar_2.addItem("Nhập Bao_duong_xe", new Command() {
			public void execute() {
				ThesisBao_duong_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Chi_nhanh", new Command() {
			public void execute() {
				ThesisChi_nhanhWindow();
			}
		});



		menuBar_2.addItem("Nhập Dieu_khoan_hop_dong", new Command() {
			public void execute() {
				ThesisDieu_khoan_hop_dongWindow();
			}
		});



		menuBar_2.addItem("Nhập Gps_markers", new Command() {
			public void execute() {
				ThesisGps_markersWindow();
			}
		});



		menuBar_2.addItem("Nhập Hop_dong_thue_xe", new Command() {
			public void execute() {
				ThesisHop_dong_thue_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Lich_su_cap_nhat_xe", new Command() {
			public void execute() {
				ThesisLich_su_cap_nhat_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Model_xe", new Command() {
			public void execute() {
				ThesisModel_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Nhat_ki_hanh_trinh", new Command() {
			public void execute() {
				ThesisNhat_ki_hanh_trinhWindow();
			}
		});



		menuBar_2.addItem("Nhập Sys_sessions", new Command() {
			public void execute() {
				ThesisSys_sessionsWindow();
			}
		});



		menuBar_2.addItem("Nhập Thiet_bi", new Command() {
			public void execute() {
				ThesisThiet_biWindow();
			}
		});



		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rongWindow();
			}
		});



		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong_cua_chi_nhanh", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rong_cua_chi_nhanhWindow();
			}
		});



		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong_cua_xe", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rong_cua_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Xe", new Command() {
			public void execute() {
				ThesisXeWindow();
			}
		});



		menuBar_2.addItem("Nhập Bao_duong_xe", new Command() {
			public void execute() {
				ThesisBao_duong_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Chi_nhanh", new Command() {
			public void execute() {
				ThesisChi_nhanhWindow();
			}
		});



		menuBar_2.addItem("Nhập Dieu_khoan_hop_dong", new Command() {
			public void execute() {
				ThesisDieu_khoan_hop_dongWindow();
			}
		});


		menuBar_2.addItem("Nhập Gps_markers", new Command() {
			public void execute() {
				ThesisGps_markersWindow();
			}
		});



		menuBar_2.addItem("Nhập Hop_dong_thue_xe", new Command() {
			public void execute() {
				ThesisHop_dong_thue_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Lich_su_cap_nhat_xe", new Command() {
			public void execute() {
				ThesisLich_su_cap_nhat_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Model_xe", new Command() {
			public void execute() {
				ThesisModel_xeWindow();
			}
		});



		menuBar_2.addItem("Nhập Nhat_ki_hanh_trinh", new Command() {
			public void execute() {
				ThesisNhat_ki_hanh_trinhWindow();
			}
		});


		menuBar_2.addItem("Nhập Sys_sessions", new Command() {
			public void execute() {
				ThesisSys_sessionsWindow();
			}
		});

		menuBar_2.addItem("Nhập Thiet_bi", new Command() {
			public void execute() {
				ThesisThiet_biWindow();
			}
		});


		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rongWindow();
			}
		});


		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong_cua_chi_nhanh", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rong_cua_chi_nhanhWindow();
			}
		});


		menuBar_2.addItem("Nhập Thuoc_tinh_mo_rong_cua_xe", new Command() {
			public void execute() {
				ThesisThuoc_tinh_mo_rong_cua_xeWindow();
			}
		});


		menuBar_2.addItem("Nhập Xe", new Command() {
			public void execute() {
				ThesisXeWindow();
			}
		});


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

	public void ThesisModelXeWindow() {
		GInternalFrame win = new DefaultGInternalFrame("Nhập model xe");
		Composite com = new EquipmentCPS(win);
		win.setContent(com);
		win.setSize(com.getOffsetWidth(), com.getOffsetHeight());
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}

	public void ThesisBao_duong_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Bao_duong_xe");
		win.setUrl("http://localhost/vehicle/index.php/Bao_duong_xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisChi_nhanhWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Chi_nhanh");
		win.setUrl("http://localhost/vehicle/index.php/Chi_nhanh_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisDieu_khoan_hop_dongWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Dieu_khoan_hop_dong");
		win.setUrl("http://localhost/vehicle/index.php/Dieu_khoan_hop_dong_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisGps_markersWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Gps_markers");
		win.setUrl("http://localhost/vehicle/index.php/Gps_markers_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisHop_dong_thue_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Hop_dong_thue_xe");
		win.setUrl("http://localhost/vehicle/index.php/Hop_dong_thue_xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisLich_su_cap_nhat_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Lich_su_cap_nhat_xe");
		win.setUrl("http://localhost/vehicle/index.php/Lich_su_cap_nhat_xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisModel_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Model_xe");
		win.setUrl("http://localhost/vehicle/index.php/Model_xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisNhat_ki_hanh_trinhWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Nhat_ki_hanh_trinh");
		win.setUrl("http://localhost/vehicle/index.php/Nhat_ki_hanh_trinh_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisSys_sessionsWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Sys_sessions");
		win.setUrl("http://localhost/vehicle/index.php/Sys_sessions_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisThiet_biWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Thiet_bi");
		win.setUrl("http://localhost/vehicle/index.php/Thiet_bi_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisThuoc_tinh_mo_rongWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Thuoc_tinh_mo_rong");
		win.setUrl("http://localhost/vehicle/index.php/Thuoc_tinh_mo_rong_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisThuoc_tinh_mo_rong_cua_chi_nhanhWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Thuoc_tinh_mo_rong_cua_chi_nhanh");
		win.setUrl("http://localhost/vehicle/index.php/Thuoc_tinh_mo_rong_cua_chi_nhanh_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisThuoc_tinh_mo_rong_cua_xeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Thuoc_tinh_mo_rong_cua_xe");
		win.setUrl("http://localhost/vehicle/index.php/Thuoc_tinh_mo_rong_cua_xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}
	public void ThesisXeWindow(){
		GInternalFrame win = new DefaultGInternalFrame("Quan ly Xe");
		win.setUrl("http://localhost/vehicle/index.php/Xe_c/read");
		win.setSize(1024, 510);
		win.setResizable(true);
		win.setMinimizable(true);
		win.setMaximizable(true);
		desktop.addFrame(win);
		win.setVisible(true);
	}


}
